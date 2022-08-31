export default function addTargetLinks(links){
    const $arryLinks=document.querySelectorAll(links);
    document.addEventListener('click',(e)=>{
        if(e.target.matches(links)){
            $arryLinks.forEach(el => {
                el.removeAttribute('aria-current');
            });
            e.target.setAttribute('aria-current','page');
        }
    })
}