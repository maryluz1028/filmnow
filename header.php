<?php get_template_part( 'templates/partials/document-open' ); ?>
<header class="header w-full h-[80px] bg-color-black">
    <div class="container">
        <div class="flex flex-row items-center justify-between">
            <div class="logo">
                <a href="<?php bloginfo("home"); ?>">
                    <img class="w-[50px] h-[50px] max-w-[50px]" src="<?= get_logo(); ?>" alt="film now">
                </a>
            </div>
            <?php
                $argsMainMenu=array(
                    'location'=>'menu_main',
                    'container'=>'nav',
                    'container_class'=>'nav-menu-main',
                    'container_id'=>'nav_menu_main'
                );
                wp_nav_menu($argsMainMenu);
            ?>
            <div class="header-icons-mobile flex flex-row items-center justify-center gap-2">
                <div class="search" id="search">
                    <?php get_search_form();?>
                    <button class="close-form-search" id="close_form_search"><i class="fas fa-xmark"></i></button>
                </div>
                <div class="btn-search w-[30px] h-[30px] md:hidden">
                    <button class="w-full h-full flex justify-center items-center leading-none transition-colors duration-300 ease-linear lg:hover:text-color-red" id="btn_search">
                        <i class="fas fa-magnifying-glass"></i>
                    </button>
                </div>
                <div class="hamburger w-[30px] h-[30px] lg:hidden">
                    <button class="btn-hamburger w-full h-full flex justify-center items-center" id="btn_hamburger">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<main>