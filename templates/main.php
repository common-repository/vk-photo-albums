<?php


$albums = WordpressPhotoAlbum::getAlbums(0, true);
status_header(200);

add_filter('wp_title', function(){
    return WordpressPhotoAlbum::__t('menu_name');
});


get_header();


?>

<div class="container">
    <h1 class="album-h1"><?php wp_title();?></h1>
    <div class="row wp-photo-album">
        <?php foreach ($albums as $album): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 album-preview">
                <div class="thumbnail photo-thumb">
                    <a href="<?php echo WordpressPhotoAlbum::albumUrl($album->slug);?>">
                        <img src="<?php echo $album->lastPhoto;?>" class="centered" title="<?php echo $album->name;?>">

                    </a>
                </div>
                <a href="<?php echo WordpressPhotoAlbum::albumUrl($album->slug);?>"><?php echo $album->name;?></a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php get_footer(); ?>
