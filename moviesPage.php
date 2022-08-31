<?php
/*
Template Name:Peliculas
Template Post Type: post, page, event
*/
get_header();
?>
<div class="list-all-movies">
    <div class="container">
        <div class="movie-list ">
            <?php
            $argsListAllMovies=array(
                'post_type'=>'peliculas',
                'posts_per_page'=>18,
                'meta_key'=>'release_date',
                'meta_value'=>date('Ymd'),
                'meta_compare'=>'<',
                'orderby'=>'meta_value_num',
                'order'=>'DESC'
            );
            $listAllMovies=new WP_QUERY($argsListAllMovies);
            if($listAllMovies->have_posts()):
                while($listAllMovies->have_posts()):
                    $listAllMovies->the_post();
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