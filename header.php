<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?>

<!DOCTYPE html>
<html>
   <head>
      <title>Nameblog </title>
      
      <link rel="icon" href="<?php bloginfo('template_url'); ?>/assets/images/icon.png" sizes="16x16" type="image/png">
      <link rel="icon" href="<?php bloginfo('template_url'); ?>/assets/images/icon.png" sizes="16x16 32x32" type="image/png">
	  <?php wp_head(); ?>
   </head>
   <body class="bg">
      <div class="topbar">
         <div class="tophead">
            <a href="index.php">
               <h1><i class="fa fa-quote-left"></i> NOMEBLOG</h1>
            </a>
         </div>
         <!--end of tophead-->
         <div class="topmenu">
            
			
               <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
			   
            
         </div>
         <!--end of topmenu-->
         <div class="bars">
            <a href="#"><i class="fa fa-bars"></i></a>
         </div>
      </div>
      <!--end of topbar-->
      <div class="mobile-menu">
         <ul>
            <li><a href="#"><i class="fa fa-hashtag"></i>Latest</a></li>
            <li><a href="#"><i class="fa fa-hashtag"></i>Html</a></li>
            <li><a href="#"><i class="fa fa-hashtag"></i>Css</a></li>
            <li><a href="#"><i class="fa fa-hashtag"></i>Java</a></li>
            <li><a href="#"><i class="fa fa-hashtag"></i>Php</a></li>
         </ul>
      </div>
      <!--end of mobile-menu-->
