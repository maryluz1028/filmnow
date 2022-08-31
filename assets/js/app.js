// you can also require modules if they support it…

// Some convenient tools to get you started…
import ReplaceObfuscatedEmailAddresses from "./components/ReplaceObfuscatedEmailAddresses";
import AnimateOnPageLinks from "./components/AnimateOnPageLinks";

import {addIconSearch,openFormSearch} from "./components/Search";
import {openNavMain} from "./components/Hamburger";
import addTargetLinks from './components/AddTarget';
import {addIconForSubmenu,subMenu} from "./components/Submenu";
import openModalMovieTrailer from "./components/OpenModalMovieTrailer";


document.addEventListener('DOMContentLoaded',(e)=>{
    addIconSearch('searchsubmit');
    openFormSearch("#btn_search","search",'#close_form_search')
    openNavMain('#btn_hamburger',"nav_menu_main");
    addTargetLinks('#nav_menu_main li a');
    addIconForSubmenu("#menu-menu-principal .menu-item-has-children")
    subMenu('.openSubMenu');
    openModalMovieTrailer('.btn-play','modal_movie_trailer','#btn_close_movie_trailer');
});
