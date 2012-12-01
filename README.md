# WP Booklet
This plugin adds [jQuery Booklet](http://builtbywill.com/code/booklet/) as a shortcode to WordPress.

## Install
Create the folder `$wordpress/wp-content/plugins/wp-booklet` and place all files in it. Activate the plugin in the WordPress plugin section.

## Use
There are currently two ways to use the shortcode

	[booklet]<div><img src="image1.jpg" /></div>
	<div><img src="image2.jpg" /></div>
	<div><img src="image3.jpg" /></div>
	<div><img src="image4.jpg" /></div>
	<div><img src="image5.jpg" /></div>
	<div><img src="image6.jpg" /></div>[/booklet]

This is fine for a small number of images, but for a larger number it is not very userfriendly. You can place all image files into a directory on the webserver.

	[booklet dir="relative/path/from/wordpress-root"]

The shortcode will use all .jpg-Files it finds in there and list them in the manner shown above.

### Supported parameters
The following parameters of Booklet can be used in the shortcode.

* id
* closed

This list will grow in the future.

## Credits
WP Booklet is written and maintained by [Gerald Schneider](http://schneidr.de).

jQuery Booklet is written and maintained by [http://builtbywill.com](http://builtbywill.com)

## License
This software is published under the [CC BY 3.0 licence](http://creativecommons.org/licenses/by/3.0/)

Booklet is available under the [MIT licence](http://opensource.org/licenses/MIT)