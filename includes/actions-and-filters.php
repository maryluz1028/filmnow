<?php
function register_menus(){
    register_nav_menus(
        array(
        'menu_primary'=>('menu_main'),
        'menu_mobile'=>('menu_mobile')
    ));
}
function add_supports(){
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
function get_logo(){
    $custom_logo_id=get_theme_mod('custom_logo');
    $url_logo=wp_get_attachment_image_src($custom_logo_id);
    return $url_logo[0];
}
function get_main_image_url($size){
    global $post;
    $image_id=get_post_thumbnail_id($post);
    $image_url=wp_get_attachment_image_src($image_id,$size);
    return $image_url[0];
}
function set_post_views(){
    if(is_single()){
        $post_id = get_the_ID();
        $count_views = get_post_meta($post_id,'post_views',true);
        if($count_views==''){
            delete_post_meta($post_id,'post_views');
            add_post_meta($post_id,'post_views',1);
        }else{
            update_post_meta($post_id,'post_views',++$count_views);
        }
    }
}
function get_post_views($post_id){
    $count_views = get_post_meta($post_id,'post_views',true);
        if($count_views==''){
            delete_post_meta($post_id,'post_views');
            add_post_meta($post_id,'post_views',0);
            return 0;
        }
        return $count_views;
}
add_action('after_setup_theme','register_menus');
add_action('after_setup_theme','add_supports');
add_action('wp','set_post_views');