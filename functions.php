<?php
function init_template(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    register_nav_menus(  
        array(
            'top_menu' => 'menú principal'
        )
    );
}
//agregando la accion init-template para que se ejecute
add_action('after_setup_theme','init_template');
//agregando estilos y fuentes
function assets(){
    wp_register_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css', '', '4.4.1', 'all' );
    wp_register_style( 'montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap','', '1.0', 'all');
    wp_enqueue_style( 'estilos',get_stylesheet_uri(), array('bootstrap','montserrat'), '1.0'|'all');
    wp_register_script( 'Bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js', '', '1.16', true );
    //jquery
    /* wp_enqueue_script( 'bootstraps', 'urljquery', array('jquery','popper'), '4.4.1', true ); */
    wp_enqueue_script( 'custom', get_template_directory_uri().'/assets/js/custom.js','','1.0',true);
}
//agregando la funcion ssets para que se ejecute
add_action( 'wp_enqueue_scripts', 'assets');

//sidebar
function sidebar(){
    register_sidebar( 
        array(
        'name'=>'pie de pagina',
        'id'=>'footer',
        'description'=>'zona de Widget para pie de paginas',
        'before_title'=>'<p>',
        'afeter_title'=>'</p>',
        'before_widget'=>'<div id="%1$s" class="%2$s">',
        'after_widget'=>'</div>'
    ) );
}
//agregando sidebar
add_action('widgets_init','sidebar');