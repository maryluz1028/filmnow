<?php
$post_per_page=$args['post_per_page'] ?? '';
$argsUpcomingMovies=array(
    'post_type'=>'peliculas',
    'posts_per_page'=>$post_per_page,
    'meta_key'=>'release_date',
    'meta_value'=>date('Ymd'),
    'meta_compare'=>'>=',
    'meta_type'=>'date',
    'orderby'=>'meta_value_num',
    'order'=>'ASC'
);
echo $date;
$upcomingMovies=new WP_QUERY($argsUpcomingMovies);
if($upcomingMovies->have_posts()):
    while($upcomingMovies->have_posts()):
        $upcomingMovies->the_post();
        get_template_part('templates/views/movie');
    endwhile;
endif;
?>