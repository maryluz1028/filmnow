export function addIconForSubmenu(submenuParent){
    const $icon=`
    <div class="openSubMenu">
    </div>
    `;
    const subMenuParents=document.querySelectorAll(submenuParent);
    subMenuParents.forEach(el => {
        el.insertAdjacentHTML('afterBegin',$icon);
    });
}
export function subMenu(openSubmenu){
    document.addEventListener('click',(e)=>{
        if(e.target.matches(openSubmenu) || e.target.matches(`${openSubmenu} *`)){
            e.target.classList.toggle('active');
        }
    });
}
