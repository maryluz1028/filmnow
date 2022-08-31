<?php
get_header();
?>
    <section class="more-movie-details bg-color-black">
        <?php
        $portada=get_field('portada');
        $title=get_the_title();
        $videoUrl=get_field('video_embed_url');
        get_template_part('templates/views/modal-movie-trailer');
        if(have_rows('movie_trailer_group')):
            while(have_rows('movie_trailer_group')):
                the_row();
                $trailer_url;
                $format_trailer_movie_active=get_sub_field('format_trailer_movie_active');
                if($format_trailer_movie_active == 'Archivo'){
                    $retrieved_trailer_url=get_sub_field('trailer_file');
                    get_template_part('templates/views/modal-movie-trailer',null,[
                        'trailer_file_url'=>$retrieved_trailer_url
                    ]);
                }elseif($format_trailer_movie_active=='Enlace'){
                    $retrieved_trailer_url=get_sub_field('trailer_url');
                    get_template_part('templates/views/modal-movie-trailer',null,[
                        'trailer_url'=>$retrieved_trailer_url
                    ]);
                }
            endwhile;
        endif;
        ?>
        <div class="movie-cover-container h-[300px] md:h-[350px] lg:h-[400px] w-full">
            <div class="movie-cover-content h-full w-full btn-play">
                <img class="movie-cover-image" src="<?= esc_url($portada['url']); ?>" alt="<?= $title; ?>" >
            </div>
        </div>
        <div class="movie-details container">
            <div class="main-details-movie mb-6">
                <h1 class="movie-title mb-4 text-xl lg:text-2xl uppercase font-bold"><?=$title;?></h1>
                <div class="movie-year-duration mb-4">
                    <?php
                    $date=strtotime(get_field('release_date'));
                    ?>
                    <span class="year pr-[12px]  inline-block leading-none border-r border-solid border-color-black2"><?= date('Y',$date);?></span>
                    <span class="duration pl-[8px] inline-block leading-none "><?= get_field('duration'); ?></span>
                </div>
                <div class="movie-categories flex flex-row flex-wrap gap-4 mb-4">
                        <?php
                        $movieGenres=wp_get_object_terms(get_the_id(),'genero');
                        foreach ($movieGenres as $genre) {
                            ?>
                            <a class="py-1 px-4 border border-solid border-color-black2" href="<?= get_term_link($genre->term_id) ?>"><?= $genre->name; ?></a>
                            <?php
                        }
                        ?>
                </div>
                <p class="movie-sinopsis mb-4"><?= get_field('sinopsis');?></p>
                <button class="btn-view-trailer btn-play">Ver Trailer</button>
            </div>
            <hr class="w-[50px] mb-6 border-color-black2">
            <div class="secondary-details-movie">
                <div class="info">
                    <h2>Más Información</h2>
                    <table class="tbl-more-info">
                        <tr>
                            <th>Estreno:</th>
                            <td><?= get_field('release_date');?></td>
                        </tr>
                        <tr>
                            <th>Director:</th>
                            <td><?= get_field('director');?></td>
                        </tr>
                        <tr>
                            <th>Pais:</th>
                            <td><?= get_field('country');?></td>
                        </tr>
                    </table>
                </div>
                <div class="main-actors-movie">
                    <h2>PRINCIPALES ACTORES</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php
                        if(have_rows('actors')):
                            while(have_rows('actors')):
                                the_row();
                            $photo=get_sub_field('photo');
                        ?>
                        <div class="actor">
                            <div class="actor-photo">
                                <img src="<?= esc_url($photo['url'])?>" alt="">
                            </div>
                            <div class="actor-names">
                                <span><?= get_sub_field('name')?></span>
                                <span class="voice"><?= get_sub_field('voice')?></span>
                            </div>
                        </div>
                        <?php
                        endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="related-movies">
        <div class="container">
            <div class="movie-list-header">
                <h2>Peliculas Relacionadas</h2>
                <a href="">Ver todos</a>
            </div>
            <div class="movie-list">
                <?php
                foreach ($movieGenres as $genreValue) {
                    $arrayGenres[]=$genreValue->name;
                }
                $argsRelatedMovies=array(
                'post_type'=>'peliculas',
                'posts_per_page'=>6,
                'tax_query'=>array(
                    array(
                        'taxonomy'=>'genero',
                        'field'=>'name',
                        'terms'=>$arrayGenres,
                        ),
                    ),
                );
                $relatedMovies=new WP_QUERY($argsRelatedMovies);
                if($relatedMovies->have_posts()):
                    while($relatedMovies->have_posts()):
                        $relatedMovies->the_post();
                        get_template_part('/templates/views/movie');
                    endwhile;
                endif;
                ?>
            </div>                                                                                     
        </div>
    </section>
<?php
get_footer();
?>