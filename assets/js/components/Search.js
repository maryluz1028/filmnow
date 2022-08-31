export function addIconSearch(el){
    const $inputSubmit=document.getElementById(el);
    const $btnSubmit=` <button type="submit" value="submit" id="searchsubmit">
                    <i class="fas  fa-magnifying-glass"></i>
                    </button>`
    $inputSubmit.outerHTML=$btnSubmit;
}
export function openFormSearch(btnOpen,form,btnClose){
    const $frmSearch=document.getElementById(form);
    document.addEventListener('click',(e)=>{
        if(e.target.matches(btnOpen) || e.target.matches(`${btnOpen} *`)){
            $frmSearch.classList.add('active');
        }
        if(e.target.matches(btnClose) || e.target.matches(`${btnClose} *`)){
            $frmSearch.classList.remove('active');
        }
    })
}

