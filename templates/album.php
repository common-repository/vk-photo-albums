<?php
/*  Template for album(category) echo. Displays photos
 */

$album = WordpressPhotoAlbum::getAlbum($params['album_slug']);

if(!$album){
    WordpressPhotoAlbum::redirectTo404();
}

status_header(200);

add_filter('wp_title', function() use($album){
    return WordpressPhotoAlbum::__t('photo_album') . ' ' .$album->name;
});

$page = !empty($params['page'])  ? $params['page'] : 1;


$subAlbums = WordpressPhotoAlbum::getAlbums($album->term_id, true);
$photos = WordpressPhotoAlbum::getPhotos($album->slug, $page);



 get_header();
?>
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo WordpressPhotoAlbum::albumUrl('');?>"><?php echo WordpressPhotoAlbum::__t('photo_album');?></a></li>
        <li><?php echo $album->name;?></li>
    </ol>

    <?php if($subAlbums) : ?>
        <h2 class="album-h1"><?php echo WordpressPhotoAlbum::__t('albums');?></h2>
        <div class="row wp-photo-album">
            <?php foreach ($subAlbums as $album): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 album-preview">

                    <div class="thumbnail photo-thumb">
                        <a href="<?php echo WordpressPhotoAlbum::albumUrl($album->slug);?>">
                            <img src="<?php echo $album->lastPhoto;?>" class="centered" title="<?php echo WordpressPhotoAlbum::__t('photo_album') . ' ' .$album->name; ?>">
                        </a>

                    </div>
                    <a href="<?php echo WordpressPhotoAlbum::albumUrl($album->slug); ?>">
                        <?php echo $album->name;?>
                    </a>
                    <br>
                    <?php echo WordpressPhotoAlbum::__t('photos_count'). ': ' .$album->count; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif($photos->have_posts()): ?>
        <div class="row wp-photo-album">
            <h1 class="album-h1"><?php echo $album->name; ?></h1><br>
            <?php while($photos->have_posts()): $photos->the_post();?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 photo-preview">
                    <div class="thumbnail photo-thumb">
                        <?php if(has_post_thumbnail()): ?>
                            <a href="<?php echo WordpressPhotoAlbum::photoUrl(get_the_ID()); ?>" title="<?php the_title();?>">
                                <img data-target-id="<?php the_ID();?>" src="<?php echo WordpressPhotoAlbum::getAttachmentUrl(get_the_ID())?>"
                                    alt="<?php the_title()?>"
                                >
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>

            <?php if($photos->found_posts > WordpressPhotoAlbum::$photosOnPage): ?>
                <button class="btn btn-lg show-more-photos" data-page="1">
                    <?php echo WordpressPhotoAlbum::__t('show_more')?>
                </button>
            <?php endif; ?>
        </div>
    <?php endif;?>
    <div class="wp-photo-album-bg-layer">
    </div>
    <div class="popup-photo">
        <div class="wp-photo-album-item">

        </div>
    </div>
</div>
<?php get_footer(); ?>
