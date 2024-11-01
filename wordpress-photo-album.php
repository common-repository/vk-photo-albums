<?php
/*
  Plugin Name: Wordpress Photo Album
  Plugin URI: https://github.com/TemirkhanN/wordpress-photo-album
  Description: Photo album for wordpress that looks like vk.com albums.
  Requires wordpress 3.5 and higher for full working features.
  Version: 1.0
  Author: Temirkhan
  Author URI: https://vk.com/id291918665
  License: Beerware, Free software
 */


require_once __DIR__ . '/WordpressPhotoAlbum.php';

WordpressPhotoAlbum::init();
register_uninstall_hook(__FILE__, 'WordpressPhotoAlbum::uninstall');