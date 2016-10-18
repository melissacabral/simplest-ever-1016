<?php
//this is an optional file for activating WP features and adding functionality

//activate featured images
add_theme_support( 'post-thumbnails' );

add_theme_support( 'custom-background' );

//don't forget to display the logo in header.php
add_theme_support( 'custom-logo', array(
	'width' 		=> 150,
	'height'		=> 50,
	'flex-width' 	=> true,
) );

//don't forget to add header_image() to your template
add_theme_support( 'custom-header', array(
	'width' 		=> 1000,
	'height'		=> 300,
) );

//use modern markup on WP generated components
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 
	'gallery', 'caption' ) );

//REMOVE <title> from <head> and do this instead:
add_theme_support( 'title-tag' );

//makes your Feeds more awesome
add_theme_support( 'automatic-feed-links' );

//pick and choose the formats that you need from this list:
add_theme_support( 'post-formats', array( 'video', 'link', 'gallery', 'audio', 'chat', 'quote', 'status', 'aside', 'image' ) );


//Filter the excerpt so it has more words and has a button instead of [...]
function mmc_ex_length(){
	if( is_search() ){
		return 25;
	}else{
		return 75; //default 55
	}
}
add_filter( 'excerpt_length', 'mmc_ex_length' );


function mmc_readmore(){
	return '&hellip; <a href="' . get_permalink() . '" class="readmore">Read More</a>';
}
add_filter( 'excerpt_more', 'mmc_readmore' );


//Make comment replies more User Friendly
function mmc_commentreply(){
	//attach built-in JS file
	if( comments_open() AND !is_admin() ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mmc_commentreply' );

/**
 * Add 2 Menu Locations to this theme
 * don't forget to use wp_nav_menu to display it in the header or wherever
 * @since  0.1 first draft
 */
function mmc_nav_menus(){
	register_nav_menus( array(
		'main_menu' => 'Main Menu',
		'utilities' => 'Utility Menu at the top',
	) );
}
add_action( 'init', 'mmc_nav_menus' );


/**
 * Add 4 widget areas (dynamic sidebars) to this theme
 * don't forget to run dynamic_sidebar() to display in your templates
 */
function mmc_widget_areas(){
	register_sidebar( array(
		'name' 			=> 'Blog Sidebar',
		'id'			=> 'blog-sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Footer',
		'id'			=> 'footer-area',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Home Area',
		'id'			=> 'home-area',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
}
add_action( 'widgets_init', 'mmc_widget_areas' );



//no close PHP 