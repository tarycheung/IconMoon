Tim Thumb Plugin for Hotaru CMS
--------------------------------
Created by: Nick Ramsay

Description
-----------
First of all, this plugin doesn't do anything by itself. It's used by other plugins to create and cache image thumbnails using the open source script, TimThumb. See the following URL for full details:

http://www.darrenhoyt.com/2008/04/02/timthumb-php-script-released/

This plugin contains the Tim Thumb script, and defines a constant which you can use in your own plugins, i.e.:

define("TIM_THUMB", BASEURL . 'content/plugins/tim_thumb/libs/timthumb.php?src=' . BASEURL . 'content/');

A typical image url would look like this:

http://example.com/content/plugins/tim_thumb/libs/timthumb.php?src=http://example.com/content/PATH-TO-IMAGES/imagename.jpg&w=90&h=60&zc=1

Long, right?

In your code, you can shorten that with the TIM_THUMB constant, e.g.
<img src="<?php echo TIM_THUMB; ?>PATH-TO-IMAGES/imagename.jpg&w=90&h=60&zc=1" alt="image" />

Change PATH-TO-IMAGES to the location of where the images are.

Instructions
------------
1. Upload the "tim_thumb" folder to your plugins folder. 
2. Change permissions on "tim_thumb/libs/cache/" to 777.
3. Install Tim Thumb in Admin -> Plugin Management.
4. Move Tim Thumb *above* any plugins that use it. 

Changelog
---------
v.0.2 2013/04/23 - shibuya246 - Updated following timthumb security issue to latest version
v.0.1 2010/06/29 - Nick - Released first version
