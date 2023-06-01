[Puedes encontrar una version en español de este readme aquí](./README-es.md)

Compara inmuebles plugin
==
Contributors: 
* [Brandon Vadillo](https://github.com/BrandonVG)
* [Marco Aspeitia](https://github.com/marcoAspeitia31)

Tags: Real state, plugin

License: [GPLv2 or later](http://www.gnu.org/licenses/gpl-2.0.html)

## Description

Complemental plugin for [Compara inmuebles theme](https://github.com/BrandonVadilloDev/Compara-inmuebles-theme), this plugins adds custom post types for the properties, as well uses CMB2 to add the metaboxes for all the extra information of the properties.

Also it adds a theme options section to customize some things on the front end just as logos, contact info, location, newsletters MailChimp form code.

## Installation 

### Requiriments 
- [PHP 5.6 as minimum](https://www.php.net/downloads.php)
- [WordPress 5.0 as minimum](https://wordpress.org/download/)
- [Google maps API KEY](https://developers.google.com/maps/documentation/javascript/get-api-key?hl=es)
- [CMB2 Field Type: Font Awesome Icon Selector](https://github.com/serkanalgur/cmb2-field-faiconselect)

### Quick start

1. Download this repository.
2. Unzip the content on the `/wp-content/plugins` directory or in the admin panel, go to Plugins and click the Add New button.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place the Google maps API KEY in your `wp-config.php` file as `DEFINE('PW_GOOGLE_API_KEY', 'API KEY')`

## Features
-   Adds custom post type for properties.
-   Adds custom post type for testimonials.
-   Uses CMB2 to add custom metaboxes to properties.
-   Uses CMB2 to add custom theme options.
-   Adds new taxonomies for properties.
-   Uses CMB2 to add custom metaboxes to a taxonomy.
-   Adds widgets to show properties and taxonomies.


## Credits
* Based on Wordpress plugin Boilerplate Generator https://wppb.me/.
