<?php


$album = WordpressPhotoAlbum::getAlbum($params['album_slug']);

if(!$album){
    WordpressPhotoAlbum::redirectTo404();
}




$photos = WordpressPhotoAlbum::getPhotos($album->slug, $params['page']);

if($photos->have_posts()){
    status_header(200);
}
?>



<?php if($photos->have_posts()):  ?>
    <?php while($photos->have_posts()): $photos->the_post(); ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 photo-preview">
            <div class="thumbnail photo-thumb">
                <?php if(has_post_thumbnail()): ?>
                    <a href="<?php echo WordpressPhotoAlbum::photoUrl(get_the_ID()); ?>" title="<?php the_title();?>">
                        <img data-target-id="<?php the_ID();?>" src="<?php echo WordpressPhotoAlbum::getAttachmentUrl(get_the_ID());?>"
                             alt="<?php the_title()?>"
                            >
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif;?>
