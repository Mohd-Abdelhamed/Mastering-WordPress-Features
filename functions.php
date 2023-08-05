<?php

add_theme_support('post-thumbnails');
/*
** Function To Add My Custom Style
** Added By 3b7ameed
** wp_enqueue_style
*/
    function abdo_add_style(){
        wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/css/bootstrap.min.css');
        wp_enqueue_style('fontawesome-css',get_template_directory_uri().'/css/fontawesome.min.css');
        wp_enqueue_style('main-css',get_template_directory_uri().'/css/main.css');
    } 

/*
** Function To Add My Custom Script
** Added By 3b7ameed
** wp_enqueue_script
*/
    function abdo_add_script(){
        // wp_enqueue_script('jquery');
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery',includes_url('js/jquery/jquery.js'),false,'',true);
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/js/bootstrap.min.js',array(),false,true);
        wp_enqueue_script('main-js',get_template_directory_uri().'/js/main.js',array(),false,true);
    } 

    function register_navwalker(){
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }

    function abdo_register_custom_menu(){
        register_nav_menus( 
            array(
            'bootstrap-menu'=>'Naviagtion Bar',
            'footer-menu'=>'Footer Menu'
                ));
    }

    function abdo_bootstrap_menu(){
        wp_nav_menu(array(
            // 'theme_location'    => 'bootstrap-menu',
            // 'menu_class'        => 'nav navbar-nav navbar-right',
            // 'container'         => 'div',
            // 'depth'             => 2,
            // 'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            // 'walker'            => new WP_Bootstrap_Navwalker()

            'theme_location'    => 'bootstrap-menu',
            'depth'             => 2,
            'container'         => false,
            'menu_class'        => 'nav navbar-nav navbar-right',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),

        ));
    }
    function abdo_extend_excerpt_length($length){
        if(is_author( )){
            return 20;
        }else{
            return 40;
        }
    }

    add_filter( 'excerpt_length', 'abdo_extend_excerpt_length');
    function abdo_excerpt_change_dots($more){
        return " ...";
    }
    add_filter( 'excerpt_more', 'abdo_excerpt_change_dots' );
    
add_action('wp_enqueue_scripts', 'abdo_add_style'); 
add_action('wp_enqueue_scripts', 'abdo_add_script');
add_action( 'init', 'abdo_register_custom_menu' );
add_action( 'after_setup_theme', 'register_navwalker' );

function numbering_pagination()
{
    global $wp_query;
    $all_pages=$wp_query->max_num_pages;
    $current_page= max(1,get_query_var( 'paged' ));
    if($all_pages>1){
        return paginate_links( array(
            'base'      =>  get_pagenum_link().'%_%',
            'format'    =>  'page/%#%',
            'current'   =>  $current_page,
            'mid_size'  =>  1,
            'end_size'  =>  2
        ));
    }
}

function abdo_Register_sidebar(){
    register_sidebar( array(
        'name'          =>  'Main Sidebar',
        'id'            =>  'main-sidebar',
        'description'   =>  'This Is The Main Sidebar And Appear Everywhere',
        'class'         =>  'main-sidebar',
        'before_widget' =>  '<div class="widget-content">',
        'after_widget'  =>  '</div>',
        'before_title'  =>  '<h3 class="widget-title">',
        'after_title'   =>  '</h3>'
    ) );
}
add_action( 'widgets_init','abdo_Register_sidebar' );
?>