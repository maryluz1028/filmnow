export default function openModalMovieTrailer(openModal,modalMovie,closeModal){
    const $modal=document.getElementById(modalMovie);
    const $videoContent=document.getElementById('modal-movie-content'),
    $video=$videoContent.dataset.video;
    document.addEventListener('click',(e)=>{
        if(e.target.matches(openModal)){
            $modal.classList.add('active');
            $videoContent.innerHTML=""+$video+"";
            console.log($video);
        }
        if(e.target.matches(closeModal)){
            $modal.classList.remove('active');
            $videoContent.innerHTML="";
        }
    })
}