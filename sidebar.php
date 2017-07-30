<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class="col-md-1 nopadding"></div>
               <div class="col-md-3 nopadding">
                  <div class="blog_container">
                     <div class="blog_list">
                        
                        <ul>
                           <li>
 <?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
</li>
                        </ul>
                     </div>
                     <!--end of blog_list-->
                     <div class="blog_list">
                        <h2>Recent Posts</h2>
                        <ul>
                          <?php
							$recent_posts = wp_get_recent_posts();
							foreach( $recent_posts as $recent ){
								echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
							}
							wp_reset_query();
						?>
                        </ul>
                     </div>
                     <!--end of blog_list-->
                     <div class="blog_tag">
                        <h2>Top Tags</h2>
                        <ul>
                           <?php $wpdb->show_errors(); ?> 
    <?php
        global $wpdb;
        $term_ids = $wpdb->get_col("
            SELECT term_id FROM $wpdb->term_taxonomy
            INNER JOIN $wpdb->term_relationships ON $wpdb->term_taxonomy.term_taxonomy_id=$wpdb->term_relationships.term_taxonomy_id
            INNER JOIN $wpdb->posts ON $wpdb->posts.ID = $wpdb->term_relationships.object_id
            WHERE DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= $wpdb->posts.post_date");

if(count($term_ids) > 0){

  $tags = get_tags(array(
    'orderby' => 'count',
    'order'   => 'DESC',
    'number'  => 5,
    'include' => $term_ids,
  ));

foreach ( (array) $tags as $tag ) {
    echo '<li><a href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . '</a></li>';
}
}

?>
                        </ul>
                     </div>
                     <!--end of blog_tag-->
                     <div class="blog_list">
                        <h2>Get Newsletter</h2>
                        <form>
                           <input type="email" placeholder="Enter Your Emailaddress"/>
                           <button type="submit">Subcribe Now</button>
                        </form>
                     </div>
                     <!--end of blog_list-->
                     <div class="blog_name">
                        
		               <?php dynamic_sidebar( 'sidebar-1' ); ?>
	
                        
                          <?php  dynamic_sidebar( 'smb' );?>
                       
                     </div>
                     <!--end of blog_name-->
                     <div class="blog_name">
                        <h2>Adverticement</h2>
                        <div class="ad">
                        </div>
                        <!--end of ad-->
                     </div>
                     <!--end of blog_name-->
                  </div>
                  <!--end of blog_container-->  
               </div>
               <!--end of col-md-2-->
            </div>
            <!--end of col-md-12-->
         </div>
         <!--end of row nopadding-->
      </div>
