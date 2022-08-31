export function openNavMain(btnOpenNav,navbar){
    document.addEventListener('click',(e)=>{
        if(e.target.matches(btnOpenNav) || e.target.matches(`${btnOpenNav} *`)){
            document.getElementById(navbar).classList.toggle('active');
            const $iconReplace= document.querySelector(`${btnOpenNav} i`);
            if($iconReplace.classList.contains('fa-bars')){
                $iconReplace.classList.replace('fa-bars','fa-xmark');
            }else{
                $iconReplace.classList.replace('fa-xmark','fa-bars');
            }
        }
    });
}