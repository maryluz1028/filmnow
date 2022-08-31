<?php
/*
Template Name: Peliculas Populares
Template Post type: Page, Post, Event
*/
get_header();
?>
<div class="all-popular-movies">
    <div class="container">
        <div class="page-title">
            <div class="title">
                <h1><?= the_title();?></h1>
            </div>
            <img class="title-bg-image" src="<?= esc_url(get_field('image_for_title_page')['url']);?>" alt="image-<?= the_title(); ?>">
        </div>
        <div class="movie-list">
            <?php
            get_template_part('templates/views/popular-movies',null,[
                'post_per_page'=>18
            ]);
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>