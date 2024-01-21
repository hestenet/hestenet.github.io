DESCRIPTION
-----------
It's not great for the authoring experience nor for structured content reasons
that users are defining the specific dimensions of every single image they
insert. It would be much better to allow them to choose from image styles, just
like we do for image fields. This module lets users select a responsive style
OR an image style to place images in the content.

  * For a full description of the module, visit the project page:
    https://www.drupal.org/project/inline_responsive_images

  * To submit bug reports and feature suggestions or to track changes:
    https://www.drupal.org/project/issues/inline_responsive_images

This module is essentially an answer to this issue:
https://www.drupal.org/node/2061377
When that issue makes it in into core, this module is no longer needed.

REQUIREMENTS
------------
This module requires the following core modules to be enabled:
 * Image
 * Text Editor (along with CKEditor 5 module or CKEditor 4 module)

For responsive images, of course, you must also enable the core Responsive Image module.


INSTALLATION
------------
1. Extract the tar.gz into your 'modules' directory.
2. Enable the module at 'administer/modules'.


CONFIGURATION
-------------
 * The module has no menu or modifiable settings.

 * Enable the text format filter 'Display responsive images' or 'Display image
   styles' and select the images styles/responsive styles that you want to be
   available to the user.

 * Note: either don't enable the 'Restrict images to this site' and
   'Track images uploaded via a Text Editor' filters or make sure to change the
   order so the filters of this module run after those filters.

 * When the module is enabled, create new content. In the editor, click on the
   image icon in the toolbar. A popup will open where the user can upload an
   image.
 * With CKEditor 4, there's a field in the popup to assign an image style or
   responsive style by selecting style from the dropdown menu.
 * With CKEditor 5, the dropdown menu is in the image toolbar. For now, the image
   will not appear styled in the editor, but it will when the actual text field
   is rendered on the frontend.

CREDITS
-------
We would like to credit the original authors of the patch in #2061377:
 * Wim Leers - https://www.drupal.org/u/wim-leers
 * mdrummond - https://www.drupal.org/u/mdrummond
 * Jelle_S - https://www.drupal.org/u/jelle_s
 * miraj9093 - https://www.drupal.org/u/miraj9093
 * tonnosf - https://www.drupal.org/u/tonnosf
 * erik.erskine - https://www.drupal.org/u/erikerskine
 * dimaro - https://www.drupal.org/u/dimaro
 * garphy - https://www.drupal.org/u/garphy
 * juancasantito - https://www.drupal.org/u/juancasantito


MAINTAINERS
-----------
Current maintainers:
  * Mitch Albert (mitchalbert) - https://www.drupal.org/user/2255518
  * Jeroen Vreuls (jeroen_betawerk) - https://www.drupal.org/u/jeroen_betawerk
