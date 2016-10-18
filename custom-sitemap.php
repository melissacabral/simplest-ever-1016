<?php 
/*
Template Name: Automagic sitemap
*/

get_header(); //include header.php ?>

<main id="content">

	<?php //THE LOOP
	if( have_posts() ){
		while( have_posts() ){ 
			the_post();
	?>
	<article id="post-ID" <?php post_class(); ?>>
		<h2 class="entry-title"> 
			<a href="<?php the_permalink(); ?>"> 
				<?php the_title(); ?> 
			</a>
		</h2>

		<?php 
		//only show featured image on the blog
		//don't forget to add theme support in functions 
		if( is_home() ){
			the_post_thumbnail('thumbnail'); 
		}
		?>
		
		<div class="entry-content">
			<?php the_content(); ?>

			<div class="one-third">
				<h3>Pages:</h3>
				<ul>
					<?php wp_list_pages( array(
						'title_li' => '',
						'sort_column' => 'post_title',
					) ); ?>
				</ul>
			</div>

			<div class="one-third">
				<h3>Blog Categories:</h3>
				<ul>
					<?php wp_list_categories( array(
						'title_li' 		=> '',
						'show_count' 	=> true,
					) ); ?>
				</ul>
			</div>

			<div class="one-third">
				<h3>All Blog Posts (ever)</h3>
				<ul>
					<?php wp_get_archives( array(
						'type' => 'alpha',
					) ); ?>
				</ul>
			</div>

		</div>

		
	</article>
	<!-- end post -->

	

	<?php 
		} //end while
	?>
	
	<?php 
	} //end if
	else{
		echo 'no posts to show';
	}	
	//end of THE LOOP.
	?>
	


</main>
<!-- end #content -->


<?php get_footer();  //include footer.php ?>