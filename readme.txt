=== Twitter Profile Field ===
Contributors: Jayjdk
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XHKUSU26XBKEU
Tags: twitter, profile, field, username, user, shortcode
License: GPLv2 or later
Requires at least: 2.9
Tested up to: 4.1
Stable tag: 1.5.0

Adds an additional field to the user profile page where the user can enter their Twitter username.

== Description ==

Twitter Profile Field is a simple WordPress plugin that gives the user a new field in the profile page to add in their Twitter username.

The pluhin also provides a shortcode which allows authors to display their, or others, Twitter usernames, optionally with a link, in posts, pages, and text widgets.

== Installation ==

Installation Instructions:

1. Install Twitter Profile Field either via the WordPress.org plugin directory, or by uploading the files to your `wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to your profile page (`Users > Your Profile`) and enter your Twitter username under 'Contact Info'

See the FAQ for instructions on how to use the shortcode.

== Frequently Asked Questions ==

= How do I use the shortcode? =

The shortcode is `[twitter-user]`

You can use it in posts, pages, and text widgets.

You can add several parameters to the shortcode if you want:

* `[twitter-user link="yes"]` will display your username with a link to your Twitter Profile (&lt;a href="http://twitter.com/%username%">%Username%&lt;/a>)

* `[twitter-user link="yes" title="Title tag content here"]` allows you to add a custom `title` tag to the link

* `[twitter-user userid="2"]` will display the username for the user with an ID of 2

= How to use Twitter Profile Field in template files =

There's two ways you can display your Twitter username in your template files:

1. Use `<?php echo do_shortcode( '[twitter-user]' ); ?>`. You can use all the parameters listed under "How do I use the shortcode?"

2. Use `<?php the_author_meta( 'twitter' ); ?>`. If you use it outside the loop, you should add an user ID to it by using `<?php the_author_meta( 'twitter', 1 ); ?>` where 1 is the user ID. This will continue to work even after you remove the plugin (but the usernames can't be edited then).

= It don't work - What should I do? =

First of all, make sure that the plugin is activated. If you add the to your theme file(s), make sure that you use `<?php the_author_meta('twitter', 1); ?>` if it's OUTSIDE the loop.

== Screenshots ==

1. The Profile page
2. How to use shortcodes in posts, pages and text widgets

== Changelog ==

= 1.5.0 =

* Overhauled the plugin code
* Use `https` links to the Twitter profiles
* Removed the dashboard widget
* The plugin can now be translated
* Danish translation added
* Tested with WordPress 3.7.1

= 1.4 =
* Tested up to WordPress 3.2.1
* Added the `title` and `userid` parameter to the shortcode
= 1.3 =
* Tested with 3.0
* No 2.8 support anymore
* Better code
= 1.2 =
* Uses the new 2.9 user_contactmethods for 2.9 users
= 1.1 =
* Adds a Dashboard widget
= 1.0 =
* Initial Release

== Upgrade Notice ==

= 1.4 =
Tested up to WordPress 3.2.1.
Added new parameters to the shortcode

= 1.5 =
Overhaul of the plugin code. Use https links to the Twitter profiles. Dashboard widget removed.
