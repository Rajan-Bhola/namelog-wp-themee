<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	 <div class="headerblog">
         <div class="head">
            <h2>Maecenas nec pulvinar ex</h2>
            <p>Created For  Blog</p>
            <div class="bar"></div>
         </div>
         <div class="headerblog-menu">
            <ul>
               <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/assets/images/team/avatar.jpg" alt="profile"> Udan Doe</a></li>
            </ul>
         </div>
      </div>
      <!--end of headerblog-->
      <div class="content-header">
         <div class="row nopadding">
            <div class="col-md-12 nopadding">
               <div class="col-md-8 nopadding">
                  <div class="blog_textimage">
                     <div class="blog-one">
                        		 <?php
											global $post;
											$args = array( 'posts_per_page' => 2,
															'base'               => '%_%',
	'format'             => '?paged=%#%',
	'total'              => 1,
	'current'            => 0,
	'show_all'           => false,
	'end_size'           => 1,
	'mid_size'           => 2,
	'prev_next'          => true,
	'prev_text'          => __('« Previous'),
	'next_text'          => __('Next »'),
	'type'               => 'plain',
	'add_args'           => false,
	'add_fragment'       => '',
	'before_page_number' => '',
	'after_page_number'  => ''									
															);
											$lastposts = get_posts( $args );
											foreach ( $lastposts as $post ) :
											  setup_postdata( $post ); ?>
											   <div class="blog_image">
                                               <a href="#"><img src=<?php the_post_thumbnail('full');?></a>
                                            </div>
											<div class="blog_header">
                           <div class="date">
                              
							  <?php the_category(', ');?></a> |<?php the_author_posts_link(); ?>| <?php the_time('j F');?> |<?php 
							   $metaeditor = get_post_meta( get_the_ID(), 'metaeditor', true );
							  echo $metaeditor;
							  ?>
                           </div>
                           <h3><?php the_title(); ?></h3>
                           <p><?php the_excerpt(300); 
						  
						   
						   ?></p>
						   
						  
                           <span><a  href="<?php the_permalink() ?>">Continue reading</a></span>
                        </div>
												
											
											  <?php endforeach; 
		 
											wp_reset_postdata(); ?>
                                     



                        <!--end of blog_header-->
                     </div>
                     <!--end of blog-one-->
                  
                    
                     
                    
                    
                  </div>
                  <!--end of blog_textimage-->
                  <div class="load-next">
                   <ul>  

               <?php posts_nav_link( $sep, $prelabel, $nextlabel ); ?> 
			   </ul>
                  </div>
               </div>
			  
               <!--end of col-md-8-->
               
<?php get_sidebar(); ?>
<?php get_footer(); ?>
