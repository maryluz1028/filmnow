<?php
$trailer_url=$args['trailer_url'] ?? '';
$trailer_file_url=$args['trailer_file_url'] ?? '';
if($trailer_url || $trailer_file_url):
?>
<div class="modal-movie-trailer fixed top-0 left-0 right-0 bottom-0 bg-color-alpha-black02 z-50" id="modal_movie_trailer">
    <div class="container w-full h-full flex justify-center items-center">
        <div class="relative">
            <button class="btn-close-movie-trailer" id="btn_close_movie_trailer"></button>
            <?php
            $urlMovieTrailer = parse_url($trailer_url, PHP_URL_PATH);
            $urlMovieTrailerArray = explode('/', $urlMovieTrailer);
            $lastWord = end($urlMovieTrailerArray);
            $video = ""; 
            if($trailer_url){
                $video = '<iframe class="iframe-movie-trailer"  id="iframe_movie_trailer"  src="https://www.youtube.com/embed/'.$lastWord.'/?&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>';
                }
            if($trailer_file_url){
                $video = '<video class="video-movie-trailer" id="video_movie_trailer"  src="'.$trailer_file_url.'"  controls autoplay="true"></video>   ';
            }
/*

            if($trailer_url):
            ?>
            <iframe class="iframe-movie-trailer"  id="iframe_movie_trailer" data-trailerurl="https://www.youtube.com/embed/<?= $lastWord ?>" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            
            
            <?php
            endif;
            if($trailer_file_url):
            ?>

            <video id="video_movie_trailer" data-trailerfileurl="<?= $trailer_file_url ?>"  src=" "  controls></video>
            <?php
            endif;*/
            ?>
            <div id="modal-movie-content"   data-video=" <?php echo htmlspecialchars($video,ENT_QUOTES);?>"  ></div>
        </div>
    </div>
</div>
<?php
endif;
?>

