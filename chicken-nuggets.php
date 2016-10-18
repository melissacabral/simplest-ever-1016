<?php 
/*
Template Name: Page with no sidebar
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
			<?php 
			//show full content on singular pages and posts, otherwise show short content
			if( is_singular() ){
				the_content();
				//for "paginated posts" - <!--nextpage-->
				wp_link_pages();
			}else{
				the_excerpt();
			}
			 ?>
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