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
			}else{
				the_excerpt();
			}
			 ?>
		</div>

		<div class="postmeta">
			<span class="author"> Posted by: <?php the_author(); ?> </span>
			<span class="date"> <?php the_date(); ?> </span>
			<span class="num-comments"> <?php comments_number(); ?> </span>
			<span class="categories"> 
				<?php the_category(); ?>
			</span>
			<span class="tags"><?php the_tags(); ?></span>
		</div>
		<!-- end postmeta -->
	</article>
	<!-- end post -->
	<?php 
		} //end while
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