<?php
/**
 * name blog functions and definitions
 

 */
 /*function for script*/
function add_theme_scripts() {;
  wp_enqueue_style( 'style', get_stylesheet_uri() );
 
   wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css', array (), '1.1', 'all');
   
  wp_enqueue_style( 'font-awesome.min', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.1', 'all');
 
  wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array (), '1.1', 'all');
  

    wp_enqueue_script( 'general', get_template_directory_uri() . '/assets/js/general.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'jquery-1.11.3.min', get_template_directory_uri() . '/assets/js/jquery-1.11.3.min.js', array ( 'jquery' ), 1.1, true);
 
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
/*menus*/
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );


function pfp_pre_get_posts ( $query ) {

// only interested in home page and the main query
if ( !$query->is_home() || !$query->is_main_query() ) return;

// default args - most recent post
$args = 'posts_per_page=3&order=DESC&orderby=date&ignore_sticky_posts=true';

// check for sticky posts
$sticky = get_option( 'sticky_posts' );

// have sticky posts so use them
if ( $sticky != '' ) {
$args = 'p=' . $sticky[0];
}

// clear the current query
$query->init();

// parse in the new arguments
$query->parse_query( $args );

}

add_action( 'pre_get_posts' , 'pfp_pre_get_posts' );

function namelog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'namelog' ),
		'id'            => 'sidebar-1',
		'before_description'   => '<p>',
		'after_description'   => '</P>',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'namelog' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'namelog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	 register_sidebar( array(
        'name'          => 'Social Media',
        'id'            => 'smb',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ) );

    register_sidebar( array(
        'name'          => 'Link button',
        'id'            => 'lb',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'namelog' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'namelog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'namelog_widgets_init' );

// Creating the widget


    class My_Widget extends WP_Widget {

        public function __construct() {
            $widget_ops = array( 
                'classname' => 'my_widget',
                'description' => 'Adds a new Social Media button',
            );
            parent::__construct( 'my_widget', 'Social Media ', $widget_ops );
        }

 public function widget($args, $instance) {
 
        
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $linkedin = $instance['linkedin'];
 
// social profile link
        $facebook_profile = '<ul><li class="circle"><a  href="' . $facebook . '"><i class="fa fa-facebook"></i></a></li>';
        $twitter_profile = '<li class="circle"><a  href="' . $twitter . '"><i class="fa fa-twitter"></i></a></li>';
        $google_profile = '<li class="circle"><a  href="' . $google . '"><i class="fa fa-google-plus"></i></a></li>';
        $linkedin_profile = '<li class="circle"><a  href="' . $linkedin . '"><i class="fa fa-linkedin"></i></a></li></ul>';
 
echo $args['before_widget'];
if (!empty($title)) {
echo $args['before_title'] . $title . $args['after_title'];
}
 
        echo '<div class="blog_name">';
        echo (!empty($facebook) ) ? $facebook_profile : null;
        echo (!empty($twitter) ) ? $twitter_profile : null;
        echo (!empty($google) ) ? $google_profile : null;
        echo (!empty($linkedin) ) ? $linkedin_profile : null;
        echo '</div>';
        echo $args['after_widget'];
}

    public function form($instance) {
        isset($instance['title']) ? $title = $instance['title'] : null;
        empty($instance['title']) ? $title = 'My Social Profile' : null;
 
        isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        isset($instance['google']) ? $google = $instance['google'] : null;
        isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
        </p>
 
        <?php
    }


     public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
        $instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? strip_tags($new_instance['linkedin']) : '';
 
        return $instance;
    }
    }

    

function register_designmodo_social_profile() {
register_widget('my_widget');
}
 
add_action('widgets_init', 'register_designmodo_social_profile');

/**
 * Register meta box(es).
 */
function CreateTextfield()
{
$screen = 'post';
add_meta_box('my-meta-box-id','Text Editor','displayeditor',$screen,'normal','high');
}
add_action( 'add_meta_boxes', 'CreateTextfield' ) ;

/*Display PostMeta*/
function displayeditor($post)
{
global $wbdb;
$metaeditor = 'metaeditor';
$displayeditortext = get_post_meta( $post->ID,$metaeditor, true );  
?>
<h2>Secound Editor</h2>
<label for="my_meta_box_text">Text Label</label>
    <input type="text" name="my_meta_box_text" id="my_meta_box_text" value="<?php echo $displayeditortext;?>" />
   <?php        
}

/*Save Post Meta*/
function saveshorttexteditor($post)
{
$editor = $_POST['my_meta_box_text'];
update_post_meta(  $post, 'metaeditor', $editor);
}
add_action('save_post','saveshorttexteditor');
  