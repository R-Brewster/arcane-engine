<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', '_s' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'_s_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', '_s' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', '_s' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function _s_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( '_s-style', 'rtl', 'replace' );

	wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/js/theme.js', array('jquery'), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


// Setting up color palette
function color_setup() {
	// Disable Custom Colors
	add_theme_support( 'disable-custom-colors' );
  
	// Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Green', 'ea-starter' ),
			'slug'  => 'green',
			'color'	=> '#3A5A40',
		),
		array(
			'name'  => __( 'White', 'ea-starter' ),
			'slug'  => 'white',
			'color' => '#FFFFFF',
		),
		array(
			'name'  => __( 'Black', 'ea-starter' ),
			'slug'  => 'black',
			'color' => '#000000',
		),
		array(
			'name'  => __( 'Pink', 'ea-starter' ),
			'slug'  => 'pink',
			'color' => '#A05F5D',
		),
		array(
			'name'	=> __( 'Red', 'ea-starter' ),
			'slug'	=> 'red',
			'color'	=> '#640D14',
		),
		array(
			'name'	=> __( 'Blue', 'ea-starter' ),
			'slug'	=> 'blue',
			'color'	=> '#0A1128',
		),
	) );
}

add_action( 'after_setup_theme', 'color_setup' );



//Creates a welcome post when a user is registered
add_action( 'user_register', 'user_post', 10, 1 );

function user_post( $user_id ) {
	
	 // Get user info
	 $user_info = get_userdata( $user_id );
	 $user_name =  $user_info->user_login;
	 $user_first_name = $user_info->first_name;
	 $user_last_name = $user_info->last_name;
 
	 // Create a new post
	 $user_post = array(
		 'post_title'   => 'welcome-' . $user_name, // the user's username must be the same as the associated custom post type name
		 'post_content' => '<h1>Welcome ' . $user_first_name . ' ' . $user_last_name . '</h1>',
		 'post_type'    => $user_name, // the user's username must be the same as the associated custom post type name
		 'post_author'  => $user_id
	 );
	 // Insert the post into the database
	 $post_id = wp_insert_post( $user_post );
 
	 // Add custom company info as custom fields
	 add_post_meta( $post_id, 'company_id', $user_info->ID );
	 add_post_meta( $post_id, 'company_email', $user_info->user_email );

}


//Send admins to the home page, and all other users to their welcome post
add_filter( 'login_redirect', 'after_user_login', 10, 3 );

function after_user_login( $url, $query, $user ) {

	if(isset( $user->roles ) && is_array( $user->roles )):

		if( in_array( 'administrator', $user->roles )):
		
			return home_url();

		else:
			
			$url = site_url() . '/' . $user->user_login . '/welcome-' . $user->user_login;

			return $url;

		endif;

	endif;

}


// Limit media library access
  
add_filter( 'ajax_query_attachments_args', 'wp_show_current_user_attachments' );
 
function wp_show_current_user_attachments( $query ) {
    $user_id = get_current_user_id();
    if ( $user_id && !current_user_can('activate_plugins') && !current_user_can('edit_others_posts
') ) {
        $query['author'] = $user_id;
    }
    return $query;
} 

//Hides all posts not written by user
function posts_for_current_author($query) {
    global $pagenow;
 
    if( 'edit.php' != $pagenow || !$query->is_admin )
        return $query;
 
    if( !current_user_can( 'activate_plugins' ) ) {
        global $user_ID;
        $query->set('author', $user_ID );
    }
    return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');


//Removes custom post type from ui if not current author

function remove_menu_items() {

	$user = wp_get_current_user();
	if ( !current_user_can('activate_plugins')):

		// Remove unnecessary menus 
		$menus_to_stay = array(

			// Dashboard
			'index.php',

			// Users' posts
			'edit.php?post_type=' . $user->user_login,
		);      

		foreach ($GLOBALS['menu'] as $key => $value) {          
			if (!in_array($value[2], $menus_to_stay)) remove_menu_page($value[2]);
		}  

	endif;
	 
}
add_action( 'admin_menu', 'remove_menu_items' );


// Remove WP admin dashboard widgets
// function isa_disable_dashboard_widgets() {
//     remove_meta_box('dashboard_right_now', 'dashboard', 'normal');// Remove "At a Glance"
//     remove_meta_box('dashboard_activity', 'dashboard', 'normal');// Remove "Activity" which includes "Recent Comments"
//     remove_meta_box('dashboard_quick_press', 'dashboard', 'side');// Remove Quick Draft
//     remove_meta_box('dashboard_primary', 'dashboard', 'core');// Remove WordPress Events and News
// }
// add_action('admin_menu', 'isa_disable_dashboard_widgets');


// Filter wp_nav_menu() to add additional links and other output
function new_nav_menu_items($items) {

	$user = wp_get_current_user();

	$url = '/' . $user->user_login . '/welcome-' . $user->user_login;

    $homelink = '<li class="user-home"><a href="' . $url . '">' . __('Home') . '</a></li>';
    // add the home link to the end of the menu
    $items = $items . $homelink;
    return $items;
}
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items' );
