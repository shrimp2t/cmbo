**Tags:**              metaboxes, forms, fields, options, settings, admin options 
**Requires at least:** 3.8.0  
**Tested up to:**      4.2.2  
**Version:**           1.0.0  
**License:**           GPLv2 or later  
**License URI:**       [http://www.gnu.org/licenses/gpl-2.0.html](http://www.gnu.org/licenses/gpl-2.0.html)  


###Description
CMBO is a metabox, custom fields, admin options and forms library for WordPress.


This script based on [CMB2](https://github.com/WebDevStudios/CMB2)

### Features:

* Create metaboxes to be used on post edit screens.
* [Create forms to be used on an options pages](https://github.com/WebDevStudios/CMB2/wiki/Using-CMB-to-create-an-Admin-Theme-Options-Page).
* Create forms to handle user meta and display them on user profile add/edit pages.
* [Flexible API that allows you to use CMB forms almost anywhere, even on the front-end](https://github.com/WebDevStudios/CMB2/wiki/Bringing-Metaboxes-to-the-Front-end).
* [Several field types are included](https://github.com/WebDevStudios/CMB2/wiki/Field-Types).
* [Custom API hook that allows you to create your own field types](https://github.com/WebDevStudios/CMB2/wiki/Adding-your-own-field-types).
* There are numerous hooks and filters, allowing you to modify many aspects of the library (without editing it directly).
* Repeatable fields for most field types are supported, as well as repeatable field groups.
* CMBO is safe to bundle with any project. It will only load the newest version in the system.


###Usage
#####Config your setting files:
Copy config file form forder `settings/` and Put your setting files in **one** of folders below:

- YOUR_THEME_DIR/settings/
- YOUR_THEME_DIR/inc/
- YOUR_THEME_DIR/includes/
- YOUR_THEME_DIR/admin/


**Change your admin menu settings** in file admin.php

**Change your admin options settings** in file options.php

**Change your post type metabox** in file post-meta.php

**Change your user meta** in file user-meta.php



#####Get option setting form admin options:

```php
<?php 

$value = cmbo_get_setting(  $field_id );

?>
```
#####Get user meta:
```php
<?php 

$value = get_user_meta( $user_id, $key, $single );

?>
```

#####Get user meta:

```php
<?php 

$meta_value = get_post_meta( $post_id, $key, $single ); 

?>
```

