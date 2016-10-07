<!DOCTYPE html>
<html>
<head>
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" type="text/css" 
    href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
    <meta name=viewport content="width=device-width, initial-scale=1">

    <?php wp_head(); //HOOK. required for the admin bar and plugins to work ?>
</head>
<body <?php body_class(); ?>>
    <header role="banner" id="header">
        <h1 class="site-title"><a href="<?php echo home_url(); ?>">
            <?php bloginfo('name'); ?> 
        </a></h1>
        <h2><?php bloginfo( 'description' ); ?></h2>

        <nav>
            <ul class="nav">
                <?php wp_list_pages( array(
                    'title_li'  => '', //no "pages" title
                    'depth'     => 1, //only top level pages
                ) ); ?>
            </ul>
        </nav>

    <?php get_search_form(); ?>
</header>