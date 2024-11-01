=== vk photo album ===
Contributors: temirkhan
Donate link: http://paranoia.today/en/
Tags: vk, photos, gallery, album, images
Requires at least: 3.5
Tested up to: 4.2.4
Stable tag: 4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Basic photo gallery that is familiar to vk.com photo albums. Plugin registers new taxonomy for albums and new post_type for photos. Design is adaptive

== Description ==

Basic photo gallery that is familiar to vk.com photo albums. Plugin registers new taxonomy for albums(terms) and new post_type for photos. It is fully adaptive(bootstrap grid)

Url rewriting system included, so it is manageable by settings in class.

Rules are declared in class constrcutor.

L18N system included - translations kept in plugin_dir().'/locatization/' . WordpressPhotoAlbum::LOCALE . '.php'

Can be called by WordpressPhotoAlbum::__t('some_phrase')

== Installation ==


1)Upload wordpress-photo-album folder to plugins directory

2)Activate it through plugins menu in wordpress admin-panel

3)By default photoalbum root will be shown at http://yourhost/album/


== Frequently asked questions ==

= How can I change default plugin url? =

For now it can be changed only via editing album value in next files:

/WordpressPhotoAlbum.php
* const TAXONOMY_SLUG = 'album';


/js/wp-photo-album.js
* this.rootUrl = '/album/';

= Why every photo shall be added separately? =

Because photos shall

    have comments;
    be easily be fetched(got from database) via wordpress api;
    be easily sorted and listed as other posts

== Screenshots ==

1. albums list at admin-panel
2. albums list at frontend
3. photo adding at admin panel
4. photoalbum main folder
5. photos list in album
6. photo in popup opened at album(real size)
7. photo in popup opened at album(full web-page)
8. photo opened by direct link input

== Changelog ==



== Upgrade notice ==



== Arbitrary section 1 ==

Welcome for any suggestions about new features

Github repository https://github.com/TemirkhanN/wordpress-photo-album