<!DOCTYPE html>
<html>
<head>
   
    <link rel="stylesheet" type="text/css" 
    href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
    <meta name=viewport content="width=device-width, initial-scale=1">

    <?php wp_head(); //HOOK. required for the admin bar and plugins to work ?>
</head>
<body <?php body_class(); ?>>
<header role="banner" id="header" style="background-image:url(<?php header_image() ?>);">

          <?php the_custom_logo(); ?>

        <h1 class="site-title"><a href="<?php echo home_url(); ?>">
            <?php bloginfo('name'); ?> 
        </a></h1>
        <h2><?php bloginfo( 'description' ); ?></h2>

        <?php
        //main menu
        //make sure you registered a nav menu in functions.php
        wp_nav_menu( array(
            'theme_location' => 'main_menu',
            'container'      => 'nav',
            'container_class'=> 'main-menu', //nav class="">
            'menu_class'     => 'whatever',  //<ul class="">
            'menu_id'        => 'something', //<ul id="">
        ) ); ?>

        <?php 
        //utility menu
        wp_nav_menu( array(
           'theme_location' => 'utilities', 
           'container'      => false,           //no <div> or <nav>
           'menu_class'     => 'utility-menu',  //<ul class="utility-menu">
           'fallback_cb'    => false,           //do nothing if no menu assigned
        ) ); ?>

    <?php get_search_form(); ?>
</header>