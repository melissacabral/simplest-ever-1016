<?php get_header(); //include header.php ?>

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
	<section>
		<?php 
		if( !is_singular() && wp_is_mobile() ){
			//archive pagination (lists of posts)
			previous_posts_link('&larr; Newer Posts'); 
			next_posts_link('Older Posts &rarr;');	

		}elseif( !is_singular() ){
			
			//numbered pagination (since 4.1)
			the_posts_pagination();

		}else{
			//singular pagination
			previous_post_link( '%link', '&larr; Older: %title' ); //older post			
			next_post_link( '%link', 'Newer: %title &rarr;' ); //newer post
		}
		?>
	</section>
	<?php 
	} //end if
	else{
		echo 'no posts to show';
	}	
	//end of THE LOOP.
	?>
	


</main>
<!-- end #content -->

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer();  //include footer.php ?>