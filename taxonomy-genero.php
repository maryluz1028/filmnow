<?php
get_header();
?>
<div class="all-movies-genre">
    <div class="container">
        <div class="page-title">
            <div class="title">
                <?php  $nameTax=get_term_by('slug',get_query_var('term'),'genero');?>
                <h1><?= $nameTax->name; ?></h1>
            </div>
            <img class="title-bg-image" src="<?= z_taxonomy_image_url($nameTax->term_id) ?>" alt="">
        </div>
        <div class="movie-list">
            <?php
            if(have_posts()):
                while(have_posts()):
                    the_post();
                    get_template_part('templates/views/movie');
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>