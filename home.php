<?php
/*
Template Name: Inicio
Template Post Type: post, page, event
*/
get_header();

?>
<section class="hero-image relative w-full h-[100vh] sm:h-auto lg:max-h-[500px]">
    <img class="w-full h-full max-h-[inherit] object-cover object-[70%]" src="<?= esc_url(get_field('hero_image')['url']); ?>" alt="">
    <div class="hero-image-border absolute top-0 left-0 right-0 bottom-0">
        <div class="container h-full flex items-center">
            <div class="content">
                <h1>noche de peliculas</h1>
                <h2>Disfruta las mejores peliculas <br>solo aquí</h2>
                <h2>Contamos con más de <br> 1000.00 peliculas</h2>
                <button class="btn-watch-movies">Ver peliculas</button>
            </div>
        </div>
    </div>
</section>
<section class="upcoming-movies">
    <div class="container">
        <div class="movie-list-header">
            <h2>Próximos lanzamientos</h2>
            <a href="<?= bloginfo('url').'/proximos-lanzamientos';?>">Ver todos</a>
        </div>
        <div class="movie-list">
            <?php
            get_template_part('templates/views/upcoming-movies',null,[
                'post_per_page'=>9
            ]);
            ?>
        </div>
    </div>
</section>
<section class="recent-movies">
    <div class="container">
        <div class="movie-list-header">
            <h2>Películas recientes</h2>
            <a href="<?= bloginfo('url').'/peliculas' ?>">Ver todos</a>
        </div>
        <div class="movie-list">
            <?php
            $argsRecentMovies=array(
                'post_type'=>'peliculas',
                'posts_per_page'=>12,
                'meta_key'=>'release_date',
                'meta_value'=>date('Ymd'),
                'meta_compare'=> '<',
                'meta_type'=>'date',
                'orderby'=>'meta_value_num',
                'order'=>'DESC'
            );
            $recentMovies= new WP_QUERY($argsRecentMovies);
            if($recentMovies->have_posts()):
                while($recentMovies->have_posts()):
                    $recentMovies->the_post();
                    get_template_part("/templates/views/movie");
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>
<section class="popular-movies">
    <div class="container">
        <div class="movie-list-header">
            <h2>Películas más populares</h2>
            <a href="<?= bloginfo('home').'/peliculas-populares' ?>">Ver todos</a>
        </div>
        <div class="movie-list">
            <?php
            get_template_part('templates/views/popular-movies',null,[
                'post_per_page'=>6
            ]);
            ?>
        </div>
    </div>
</section>
<section class="random-movies">
    <?php
    $argsRandomMovies=array(
        'post_type'=>'peliculas',
        'posts_per_page'=>1,
        'meta_key'=>'release_date',
        'meta_value'=>date('Ymd'),
        'meta_compare'=>'<',
        'meta_type'=>'date',
        'orderby'=>'rand',

    );
    $randomMovies=new WP_QUERY($argsRandomMovies);
    if($randomMovies->have_posts()):
        while($randomMovies->have_posts()):
            $randomMovies->the_post();
            $portada=get_field('portada');
            ?>
            <a href="<?= the_permalink(); ?>">
                <div class="rand-movie-img">
                    <img class="rand-img" src="<?= esc_url($portada['url']);?>" alt="<?= get_field('title');?>">
                    <div class="rand-movie-inner">
                        <h3 class="w-full p-4 text-center text-3xl bg-color-alpha-black uppercase"><?= get_field('title');?></h3>
                    </div>
                </div>
            </a>
            <?php
        endwhile;
    endif;
    ?>
</section>
<?php
get_footer();
