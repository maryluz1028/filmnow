<?php
$post_per_page=$args['post_per_page']??'';

$argsPopularMovies=array(
    'post_type'=>'peliculas',
    'posts_per_page'=>$post_per_page,
    'meta_query'=>array(
        'relation'=>'AND',
        'movielst'=>array(
            'key'=>'release_date',
            'value'=>date('Ymd'),
            'compare'=>'<',
            'type'=>'date'
        ),
        'numViews'=>array(
                'key'=>'post_views',
        ),
    ),
    'orderby' => array( 
        'numViews' => 'DESC'
    ),
);
$popularMovies=new WP_QUERY($argsPopularMovies);
if($popularMovies->have_posts()):
    while($popularMovies->have_posts()):
        $popularMovies->the_post();
        get_template_part("templates/views/movie");
    endwhile;
endif;
?>