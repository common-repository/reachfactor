<?php
// ReachFactor settings page

function reachfactor_options_menu() {
  add_options_page( 'ReachFactor Options', 'ReachFactor', 'manage_options', 'reachfactor-options', 'reachfactor_options' );
}

function reachfactor_admin_init(){
  register_setting( 'reachfactor_options', 'reachfactor_options', 'reachfactor_options_validate');
  add_settings_section('reachfactor_options_main', 'Main Settings', 'reachfactor_options_main_section_text', 'reachfactor');
  add_settings_section('reachfactor_options_widget', 'Widget Settings', 'reachfactor_options_widget_section_text', 'reachfactor');
  add_settings_section('reachfactor_options_badge',  'Badge Settings', 'reachfactor_options_badge_section_text', 'reachfactor');
  add_settings_field('reachfactor_email', 'Email', 'reachfactor_options_email_field', 'reachfactor', 'reachfactor_options_main');
  add_settings_field('reachfactor_badge_size', 'Badge Size', 'reachfactor_options_badge_size_field', 'reachfactor', 'reachfactor_options_badge');
  add_settings_field('reachfactor_badge_style', 'Badge Style', 'reachfactor_options_badge_style_field', 'reachfactor', 'reachfactor_options_badge');
  add_settings_field('reachfactor_widget_size', 'Widget Size', 'reachfactor_options_widget_size_field', 'reachfactor', 'reachfactor_options_widget');
  add_settings_field('reachfactor_widget_style', 'Widget Style', 'reachfactor_options_widget_style_field', 'reachfactor', 'reachfactor_options_widget');
}

function reachfactor_options_main_section_text() {
  $options = get_option("reachfactor_options");
  if ($options["user_id"]) {
    echo "<img src='{$options["picture"]}' style='float: left; margin-right: 10px'>";
    echo "<p>Your ReachFactor Plugin is configured for {$options["full_name"]}.</p><p>To change that, change the email and hit Save Changes.</p>";
    echo "<p>To put the ReachFactor widget in your templates use &lt;?php reachfactor_widget(); ?&gt;</p>";
    echo "<p>To put the ReachFactor badge in your templates use &lt;?php reachfactor_badge(); ?&gt;</p>";
    echo "<p>If you have any troubles contact <a href='mailto:support@reachfactor.com'>support@reachfactor.com</a></p>";
  } else {
    echo "<p>Enter your email to configure your ReachFactor plugin with your ReachFactor account. If you have any troubles contact <a href='mailto:support@reachfactor.com'>support@reachfactor.com</a></p>";
  }
}

function reachfactor_options_email_field() {
  $options = get_option('reachfactor_options');
  echo "<input id='reachfactor_email' name='reachfactor_options[email]' size='40' type='text' value='{$options['email']}' />";
}

function reachfactor_options_widget_section_text() {
  echo "<p>The following options affect the display of your ReachFactor widgets.</p>";
}

function reachfactor_options_widget_size_field() {
  $options = get_option('reachfactor_options');
  $value   = $options["widget_size"];
  if ($value == null) $value = 500;
  echo "<input id='reachfactor_widget_size' name='reachfactor_options[widget_size]' size='5' type='text' value='$value' style='text-align: right;' />px";
}

function reachfactor_options_widget_style_field() {
  $options = get_option('reachfactor_options');
  $chosen  = $options["widget_style"];
  if ($chosen == null) $chosen  = "green";
  echo "<select id='reachfactor_widget_style' name='reachfactor_options[widget_style]'>";
  echo "<option value='green'".($chosen == "green" ? " selected" : "").">Green</option>";
  echo "<option value='black'".($chosen == "black" ? " selected" : "").">Black</option>";
  echo "</select>";
}

function reachfactor_options_badge_section_text() {
  echo "<p>The following options affect the display of your ReachFactor badges.</p>";
}

function reachfactor_options_badge_size_field() {
  $options = get_option('reachfactor_options');
  $chosen  = $options["badge_size"];
  if ($chosen == null) $chosen  = "large";
  echo "<select id='reachfactor_badge_size' name='reachfactor_options[badge_size]'>";
  echo "<option value='small'".($chosen == "small" ? " selected" : "").">Small</option>";
  echo "<option value='medium'".($chosen == "medium" ? " selected" : "").">Medium</option>";
  echo "<option value='large'".($chosen == "large" ? " selected" : "").">Large</option>";
  echo "</select>";
}

function reachfactor_options_badge_style_field() {
  $options = get_option('reachfactor_options');
  $chosen  = $options["badge_style"];
  if ($chosen == null) $chosen  = "green";
  echo "<select id='reachfactor_badge_style' name='reachfactor_options[badge_style]'>";
  echo "<option value='green'".($chosen == "green" ? " selected" : "").">Green</option>";
  echo "<option value='blue'".($chosen == "blue" ? " selected" : "").">Blue</option>";
  echo "<option value='black'".($chosen == "black" ? " selected" : "").">Black</option>";
  echo "</select>";
}

function reachfactor_options() {
  register_setting("reachfactor", "user-id");
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  echo '<div class="wrap">';
  echo '<h2>ReachFactor Plugin Settings</h2>';
  echo '<form method="POST" action="options.php">';
  echo settings_fields("reachfactor_options");
  echo do_settings_sections("reachfactor");
  echo submit_button();
  echo '</form>';
  echo '</div>';
}

function reachfactor_options_validate($options) {
  $old_options = get_option("reachfactor_options");
  $new_options = $old_options;
  if ($options["email"] != $old_options["email"]) {
    $rf_data = json_decode(file_get_contents("http://my.reachfactor.com/user/find_by_email?email={$options["email"]}"));
    if ($rf_data) {
      $new_options["email"]         = $options["email"];
      $new_options["full_name"]     = $rf_data->full_name;
      $new_options["picture"]       = $rf_data->picture;
      $new_options["profile_url"]   = $rf_data->profile_url;
      $new_options["user_id"]       = $rf_data->user_id;
      $new_options["business_name"] = $rf_data->business_name;
    }
  }

  if (in_array($options["badge_style"], ["green", "white", "black"])) $new_options["badge_style"] = $options["badge_style"];
  if (in_array($options["widget_style"], ["green", "black"])) $new_options["widget_style"] = $options["widget_style"];
  if (in_array($options["badge_size"], ["small", "medium", "large"])) $new_options["badge_size"] = $options["badge_size"];
  if ($options["widget_size"] > 0) $new_options["widget_size"] = $options["widget_size"];

  return $new_options;
}

add_action('admin_init', 'reachfactor_admin_init');
add_action("admin_menu", "reachfactor_options_menu");
?>
