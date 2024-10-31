=== ReachFactor Wordpress Plugin ===
Contributors: ReachFactor
Tags: reachfactor, real estate, reviews
Requires at least: 3.0
Tested up to: 3.4.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: trunk

ReachFactor is a simple client surveying system real estate professionals use to distinguish their service.

== Description ==

= Background =

Millions of people now turn to the Internet to vet real estate professionals before choosing one. They seek authentic client reviews. ReachFactor helps real estate agents, loan officers, and others collect and promote authentic, 3rd-party-verified testimony about their services online.

= Description =

ReachFactor’s WordPress plugin automatically syncs client testimonials received on ReachFactor with a WordPress site or blog.

= Features =

The plugin allows you to display a Client Reviews Widget which seamlessly scrolls through your client reviews, or a Trust Badge which is a small icon that displays an aggregate star rating of your service.

* Display client testimonials and reviews in a 3rd-party, trusted way
* Reviews can be displayed in Widget or Badge styles
* Sizes and colors are customizable
* Widgets and/or badges can be inserted into your WP template (appear on every page) or on individual posts, you choose
* Fast and lightweight, this plugin will not slow down your blog
* Looks great with a majority of WP themes
* Widgets and Badges are linked to your in-depth ReachFactor online profile to help you stimulate lead conversions

<a href="http://www.reachfactor.com/">What is ReachFactor?</a> | <a href="http://www.reachfactor.com/how">How ReachFactor works</a> | <a href="http://www.reachfactor.com/about-us">Why real estate ratings & reviews?</a>

== Installation ==

To install the plugin, simply copy the files into a subdirectory of the WordPress plugin directory (normally wp-content/plugins). Then go to the WordPress admin panel, and in the Plugins section you should see the ReachFactor plugin. Click on "Activate" to make your plugin active.

= Account Setup =
You must either have a premium ReachFactor account or a special free version of ReachFactor through a <a href="http://www.reachfactor.com/partners/">partner</a> for this plugin to work properly. 

= Configuration =

Once the plugin is active, inside the Settings menu, there will be an option called ReachFactor. Click on it, and a form will appear allowing you to link your plugin to a ReachFactor account and to customize your widget and badge appearance. You will need to enter the email address you have registered on ReachFactor. When you save the form the plugin will connect to ReachFactor and getthe details it needs to show the widget and badge.

= Use =

To get the widget or badge to display in the template you need to use the reachfactor_badge and reachfactor_widget template tags. For example:

`<?php reachfactor_widget(); // will display a widget ?>`

`<?php reachfactor_badge(); // will display a badge ?>`

To display the ReachFactor badge or widget in the content of a post, use the reachfactor-widget and reachfactor-badge shortcodes. For example:

`[reachfactor-widget]`

`[reachfactor-badge]`

== Screenshots ==

1. This is an example of a Reviews Widget
2. This is an example of a Trust Badge (choose from 9 versions)
3. Here's how the Green Widget looks on a real WP site.
4. Here's an example of the Black Widget on a real WP site
5. Installation is easy. First adjust your Plugin Settings.
6. Then edit your theme's template or page.
7. Save your changes and you're done. Badges and/or widgets can be installed anywhere.

== Support ==

If you have questions or need help, please contact us here: <a href="mailto:support@reachfactor.com">support@reachfactor.com</a>
