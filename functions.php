<?php
/**
 * Astra Child rillesfirst Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child rillesfirst
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_RILLESFIRST_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-rillesfirst-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_RILLESFIRST_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

// !REMOVE ORIGINAL WP WIDGETS -------------------------- =>
function wpsh_remove_dashboard_widgets() {

	remove_meta_box( 'dashboard_primary','dashboard','side' ); // WordPress.com Blog
	remove_meta_box( 'dashboard_plugins','dashboard','normal' ); // Plugins
	remove_meta_box( 'dashboard_right_now','dashboard', 'normal' ); // Right Now
	remove_action( 'welcome_panel','wp_welcome_panel' ); // Welcome Panel
	remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Try Gutenberg
	remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
	remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
	remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
	remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
	remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
	remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
	remove_meta_box('icl_dashboard_widget','dashboard','normal'); // Multi Language Plugin
	remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
}
add_action( 'wp_dashboard_setup', 'wpsh_remove_dashboard_widgets' );

// Remove Elementor Overview widget
function disable_elementor_dashboard_overview_widget() {
	remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_elementor_dashboard_overview_widget', 40);

// remove WooCommerce Dashboard Status widgets
function remove_dashboard_widgets(){
remove_meta_box( 'woocommerce_dashboard_status', 'dashboard', 'normal');    
}
add_action('wp_user_dashboard_setup', 'remove_dashboard_widgets', 20);
add_action('wp_dashboard_setup', 'remove_dashboard_widgets', 20);

// Remove Site Health from the Dashboard
add_action(
    'wp_dashboard_setup',
    function () {
        global $wp_meta_boxes;
        unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] );
    }
 );

 // !One column dashboard -------------------------------------- =>
 // NEDAN FUNGERADE EJ -BYTTE TILL V.2
// function single_columns( $columns ) {
//     $columns['dashboard'] = 1;
//     return $columns;
// }
// add_filter( 'screen_columns', 'single_columns' );
 
// function single_screen_dashboard(){return 1;}
// add_filter( 'get_user_option_screen_layout_dashboard', 'single_screen_dashboard' );

// one column version 2
function single_screen_columns( $columns ) {
    $columns['dashboard'] = 1;
    return $columns;
}
add_filter( 'screen_layout_columns', 'single_screen_columns' );
 
function single_screen_dashboard(){return 1;}
add_filter( 'get_user_option_screen_layout_dashboard', 'single_screen_dashboard' );

// !Create custom WordPress admin dashboard items


add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
wp_add_dashboard_widget('custom_help_widget', 'DASHBOARD', 'custom_dashboard_help');
}
function custom_dashboard_help() {
	// ROW WITH HEADING	
	echo '
	<div class="default-container">
	<h2>YOUR MAIN SHORTCUTS</h2>
	<hr>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make </p>
		</div>';
	
// COLUMNS WITH SHORTCUTS	
	echo '<div class="icon-container"> 
	
  	<div class="column">
	<a href="/wp-admin/edit.php?post_type=page" class="edit-pages">Edit pages</a>
	</div>
  	<div class="column "><a href="/wp-admin/post-new.php?post_type=page" class="add">Add new page</a></div>
	  <div class="column"><a href="/wp-admin/edit.php" class="edit-posts">Edit posts</a></div>
	<div class="column"><a href="/wp-admin/post-new.php" class="add">Add post</a></div>
	<div class<div class="column"><a href="/wp-admin/edit.php?post_type=page" class="edit-products">Edit products</a></div>
  	<div class="column"><a href="/wp-admin/post-new.php?post_type=page" class="add">Add new product</a></div>
	<div class="column"><a href="/wp-admin/edit.php?post_type=shop_order" class="edit-orders">Orders</a></div>
  	<div class="column"><a href="/wp-admin/nav-menus.php" class="edit-menu">Navigation</a></div>
  </div>';
  
	// ROW WITH HEADING	
	echo '<div class="default-container"><h2>VIDEO TUTORIALS</h2><hr></div>';
	// COLUMNS WITH VIDEOS	
	echo '<div class="video-container">
  
  	<div class="video-column">
	<iframe width="100%" height="315" src="https://www.youtube.com/embed/TruS3HKb6HY?controls=0" title="Woocomemrce pricing rules" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>Woocommerce pricing rules
	</div>
  
	<div class="video-column"><iframe width="100%" height="315" src="https://www.youtube.com/embed/ewbmDafQnIc?controls=0"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>Orders CSV export</div>
	
	<div class="video-column"><iframe width="100%" height="315" src="https://www.youtube.com/embed/03dJacd856s?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>Block visibility options</div>
	  
	<div class="video-column"><iframe width="100%" height="315" src="https://www.youtube.com/embed/2o60hLc-fVg?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>Reusable blocks management</div>

</div>';
  
	// COLUMN WITH CONTACT FORM	
	echo '<div class="default-container">
	<h2>CONTACT US</h2><hr>
	<p>Phone: +1 2345 6789 | email@email.com</p>
		</div>';
	echo do_shortcode( '<div class="default-container">
	[fluentform id="1"] 
	</div>');
	
// Don’rtemove this one here below	
}

// !Add custom dashboard with styles

add_action('admin_head', 'custom_dashboard');
function custom_dashboard() {

  echo '<style>
 @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap");

/* Make dashboard full width */
#wpbody-content #dashboard-widgets #postbox-container-1 {
    width: 100%;
}

/* Remove default dashboard column border */
.postbox {
border: none;
}

/* Customize columns */
.icon-container p { /* regular text */
	font-size: 16px;
	text-align: center;
}  
hr { /* divider */
  height: 3px;
  background: #ebebeb;
  border: none;
  outline: none;
  width:20%;
  margin:1em auto;
  position: relative;
}
iframe {
margin-bottom: 1em;
}
.icon-container { /* customize icon shortcut columns. Add or remove 1fr for adding or removing columns */
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr; / * four columns */
  padding: 20px;
  text-align: center;
  font-family: "Ubuntu", sans-serif;
}
.video-container {  /* customize video columns */
  display: grid;
  grid-template-columns: 1fr 1fr ; /*two columns*/
  padding: 20px;
  text-align: center;
  font-family: "Ubuntu", sans-serif;
}
.default-container {  /* customize heading and contact form containers */
  display: grid;
  grid-template-columns: 1fr ; /* one column */
  padding: 20px 20px 0px 20px;
  text-align: center;
  font-family: "Ubuntu", sans-serif;
}
.column, .video-column {
 box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}

@media (max-width: 520px) { /* for screens up to 520px. Modifies all container types */
  .icon-container, .video-container, .default-container {
    grid-template-columns: none;
	padding: 0px;
  }
}
@media (min-width: 521px) and (max-width: 767px) { /* for screens between 521 and 775px. Modifies only icon shortcut columns */
  .icon-container {
    grid-template-columns: 1fr 1fr;
	padding: 0px;
  }
}
@media (min-width: 768px) and (max-width: 990px) { /* for screens between 786 and 990px. Modifies only icon shortcut columns */
  .icon-container {
    grid-template-columns: 1fr 1fr 1fr;
	padding: 0px;
  }
}
    .column, .video-column { /* customize icon shortcut columns */
      background: #fff; 
	  color: #000;
	  padding: 30px; 
	  transition: background-color 0.5s ease;
	  text-transform: uppercase;
	  font-family: "Ubuntu", sans-serif;
	  font-size: 16px;
	  text-align: center;
	  text-decoration: none;
	  margin: 3%;
    } 
	.column:hover, .video-column:hover {  /* customize icon shortcut and video column hover style */
	background: #f9f9f9;
	}
	  .video-column { /* customize video columns */
	  padding: 10px 10px 20px 10px; 
    } 
		.column a, .video-column a { /* link colors */
	color: #000 !important;
	text-decoration: none;
	}
	
	/* SHORTCUT ICON CUSROMIZATION. It uses Dashicons, see here https://developer.wordpress.org/resource/dashicons/#menu-alt */
	
	.edit-pages:before { /* Edit pages */
	font-family: "dashicons"; 
	content: "\f123";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-posts:before { /* Edit posts */
	font-family: "dashicons"; 
	content: "\f109";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.add:before { /* Add icon */
	font-family: "dashicons"; 
	content: "\f132";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-menu:before { /* Navigation icon */
	font-family: "dashicons"; 
	content: "\f329";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-orders:before { /* Orders icon */
	font-family: "dashicons"; 
	content: "\f163";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-products:before { /* Products icon */
	font-family: "dashicons"; 
	content: "\f174";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	}
  </style>';
}