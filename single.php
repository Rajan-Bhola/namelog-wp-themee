<?php
/**
 * The template for displaying all single posts and attachments
 
 */

get_header(); ?>

<div class="content-header">
         <div class="row nopadding">
            <div class="col-md-12 nopadding">
               <div class="col-md-8 nopadding">
                  <div class="blog_textimage">
                     <div class="blog_image">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
              <div class="blog_image">
                                               <a href="#"><img src=<?php the_post_thumbnail('thumbnail');?></a>
                                            </div>
											<div class="blog_header">
                           <div class="date">
                              <a href="#"><?php the_category(', ');?> | <?php the_author(); ?> | <?php the_time('j F');?></a>
                           </div>
                           <h3><?php the_title(); ?></h3>
                           <p><?php the_content(); ?></p>
						   
                        </div>
			           <?php comments_template(); ?>
                          
		<?php	// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	

</div>
</div>
</div>
</div>
</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
