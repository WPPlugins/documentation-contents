=== Plugin Name ===
Contributors: birdsarah
Tags: table of contents, documentation, book, index
Requires at least: 3.1.0
Tested up to: 3.4.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create a table of contents for your documentation. Mark posts with tags to create new documentation versions easily when your software is updated.

== Description ==

Create a table of contents for your documentation. Mark your posts with multiple tags so you don't have to duplicate posts to create a new version of your documentation when you have a version upgrade. Put your posts in categories to order your documentation into chapters. Optionally use a custom field for fine-grained control over the order of your posts.

= Shortcode =

In a page or post where you would like to display a table of contents enter the following shortcode.
`[documentation-contents tag="v1.16" parentcat="server"]`

The above shortcode is used to display the page here. The tag specifies the tag that you have used to mark the version of your software. The parentcat is optional. If you don't specify it, the software will first look for a default parent category set in your Options and will finally just default to all.

= Mark versions of your software using Tags =

Use the Wordpress tag feature to tag your post with the different version of software that it applies too. You can tag the same post with multiple versions so that you don't have to duplicate content.

= Organize your documentation into chapters using Catagories =

By marking your post as being in a category, that is the chapter that it will end up in. Your Table of Contents will use Category names as chapter headings. Wordpress allows you to create categories with sub-categories. You can use this feature to host documentation for different things in the same place. See [screenshots](http://wordpress.org/extend/plugins/documentation-contents/screenshots/) for an example. You then mark the parent (top-level) category in the shortcode e.g.

`[documentation-contents tag="v1.16" parentcat="server"]`
`[documentation-contents tag="v1.16" parentcat="mobile"]`

You can set a default parent category in Options. If you do this, you could skip the parentcat option in the shortcode.

= Use a custom field for fine-grained control over the order in which lessons appear. =

In the absence of a custom field, the posts will just be displayed in alphabetical order.

However, I don't find that its a good idea to use numbers in my post title to specify order. Because a lesson can be used over and over again for multiple versions then you're not always guaranteed that the first number you give it is going to be the right one. So, in the options (see below) you can specify a custom field. Once you start with custom fields, you can't go back. All posts that you want to show up in your documentation must have this custom field. I use "lesson_order" as my custom field and as I'm starting out I use 10, 20, 30, 40 etc. That means that if I add an extra lesson later, I can make it 31 or 32 and I won't have to change anything else and it'll work just fine.

= Options =

Under the administration dashboard, Settings, you'll find a page Documentation Contents. See [screenshots](http://wordpress.org/extend/plugins/documentation-contents/screenshots/).

*Contents Header* is used as a custom prefix, so if you don't want it to say "Table of Contents for xxx" it can say "Documentation for xxx" or anything else you want.

*Default Category* is used to specify a default parent category, to save you typing out parentcat="xxx" in each shortcode that you use.

*Specify order with Custom Field.* If this is not set, then posts will be listed in alphabetical order. If you do set it, then you will need to mark all your posts with this custom field in order for them to be displayed.
Troubleshooting

== Frequently Asked Questions ==

= I can see all my chapters, but no lessons =

Have you specified a Custom Field in the settings above e.g. lesson_order? If yes, then make sure each of your posts that you want to appear has a value set for that custom field.

= Where can I see Documentation Contents in Action = 

The documentation contents plugin was developed for the openXdata documentation and you can see it in action at [doc.openxdata.org](http://doc.openxdata.org/http://doc.openxdata.org/server-v1-16)

== Screenshots ==

1. Use the Wordpress tag feature to tag your post with the different version of software that it applies too. You can tag the same post with multiple versions so that you don't have to duplicate content.
2. Example set of categories.
3. Use a custom field for fine-grained control over the order in which lessons appear.
4. The options panel

== Changelog ==

= 1.0.2 =
* Minor changes to readme.txt

= 1.0 =
* First Release

== Installation ==

To add a WordPress Plugin with .zip file:

1. Go to Plugins > Add New.
1. Select Upload
1. Browse to the .zip that you have downloaded onto your computer
1. Click Install Now
1. If successful, click *Activate Plugin* to activate it, or Return to Plugin Installer for further actions. 

To add a WordPress Plugin through Search:

1. Go to Plugins > Add New.
1. Under Search, type in the name of the WordPress Plugin or descripitve keyword, author, or tag in the search form or click a tag link below the search form.
1. Find the WordPress Plugin you wish to install.
 * Click Details for more information about the Plugin and instructions you may wish to print or save to help setup the Plugin.
 * Click Install Now to install the WordPress Plugin. 
1. A popup window will ask you to confirm your wish to install the Plugin.
1. If this is the first time you've installed a WordPress Plugin, enter the FTP login credential information. If you've installed a Plugin before, it will still have the login information.
1. Click Proceed to continue with the installation. The resulting installation screen will list the installation as successful or note any problems during the install.
1. If successful, click *Activate Plugin* to activate it, or Return to Plugin Installer for further actions. 

To install a WordPress Plugin manually:

1. Download your WordPress Plugin to your desktop.
1. If downloaded as a zip archive, extract the Plugin folder to your desktop.
1. Read through the "readme" file thoroughly to insure you follow the installation instructions.
1. With your FTP program, upload the Plugin folder to the wp-content/plugins folder in your WordPress directory online.
1. Go to Plugins screen and find the newly uploaded Plugin in the list.
1. Click *Activate Plugin* to activate it. 
