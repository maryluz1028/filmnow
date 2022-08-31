<?php
/*
Template Name: Proximos lanzamientos
Template Post Type: Post, Page, Event
*/
get_header();
?>
<div class="all-upcoming-movies">
    <div class="container">
        <div class="page-title">
            <div class="title">
                <h1><?php the_title();?></h1>
            </div>
            <img class="title-bg-image" src="<?= esc_url(get_field('image_for_title_page')['url']); ?>" alt="image-<?=the_title();?>">
        </div>
        <div class="movie-list">
            <?php
            get_template_part('templates/views/upcoming-movies',null,[
                'post_per_page'=>18
            ]);
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>
