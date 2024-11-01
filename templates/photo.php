<?php
/*
 *  Template for single photo
 */

$photo = WordpressPhotoAlbum::getPhoto($params['photo_id']);


if(!$photo){
    WordpressPhotoAlbum::redirectTo404();
}

status_header(200);
add_filter('wp_title', function() use($photo){
    return $photo->post_title;
});

get_header();

$GLOBALS['post'] = $photo;
?>
<div class="container">
    <h1 class="album-h1"><?php echo $photo->post_title;?></h1>
    <div class="wp-photo-album-item album-item-separate">
        <div class="photo-summary">
        <span class="photo-position">
            <?php echo WordpressPhotoAlbum::__t('singular_name') .' '. $photo->additionalInfo->position . ' ' . WordpressPhotoAlbum::__t('of') . ' ' .$photo->albumInfo->count; ?>
        </span>
        <span
            class="photo-close"
            title="<?php echo WordpressPhotoAlbum::__t('close') .' ' .WordpressPhotoAlbum::__t('photo'); ?>">
            <?php echo WordpressPhotoAlbum::__t('close'); ?>
        </span>
        </div>
        <div class="photo-item-parent">
            <img
                class="photo-item"
                src="<?php echo $photo->photoSource; ?>"
                alt="<?php echo $photo->post_title; ?>"
                title="<?php echo $photo->post_title; ?>"
                >
        </div>
        <a href="<?php echo $photo->additionalInfo->prev; ?>"
           id="previous-photo"
           data-target-id="<?php echo $photo->additionalInfo->prevId; ?>"><?php echo WordpressPhotoAlbum::__t('previous'); ?>
        </a>
        <a href="<?php echo $photo->additionalInfo->next; ?>"
           id="next-photo"
           data-target-id="<?php echo $photo->additionalInfo->nextId; ?>"><?php echo WordpressPhotoAlbum::__t('next');?>
        </a>
        <div class="row photo-additional-info">
            <div class="col-xs-9">
                <div class="photo-description">
                    <?php echo $photo->post_excerpt; ?>
                </div>
                <div class="photo-pubdate">
                    <?php echo WordpressPhotoAlbum::__t('added'); ?> <?php echo date("j F Y", strtotime($photo->post_date)); ?>
                </div>

                <?php comments_template(); ?>

            </div>
            <div class="col-xs-3">
                <a href="<?php echo WordpressPhotoAlbum::albumUrl($photo->albumInfo->slug); ?>"
                   title="<?php echo WordpressPhotoAlbum::__t('photo_album') . ' ' .$photo->albumInfo->name; ?>">
                    <?php echo $photo->albumInfo->name; ?>
                </a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>