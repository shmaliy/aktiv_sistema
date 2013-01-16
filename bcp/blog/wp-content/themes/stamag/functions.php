<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
    	'name' => 'Меню',
        'before_widget' => '<div class="sidebar-box">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
    	'name' => 'О нас',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
?>