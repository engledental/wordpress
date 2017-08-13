<?php
add_action( 'after_setup_theme', 'engle_setup' );
function engle_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menu( 'primary', __( 'Primary Menu', 'tlc' ) );
}

add_action( 'wp_enqueue_scripts', 'engle_load_scripts' );
function engle_load_scripts() {

	define('ENQUEUE_VERSION', '1.0.0');

	//post id, so we can restrict unnecessary scripts
	global $post;
	$pid = is_singular() ? $post->ID : null;

	$deps = array('jquery');

	wp_enqueue_script( 'jquery' );

	// Modernizr
	wp_register_script('modernizr',
		get_bloginfo('template_url') . '/dist/js/modernizr-custom.js',
		array(),
		ENQUEUE_VERSION
	);
	wp_enqueue_script('modernizr');

	// fitvids
	wp_register_script('fitvids',
		get_bloginfo('template_url') . '/dist/js/jquery.fitvids.js',
		array(),
		ENQUEUE_VERSION,
		true
	);
	wp_enqueue_script('fitvids');

	// Slick Slider
	wp_register_script('slick',
		get_bloginfo('template_url') . '/dist/js/slick.min.js',
		array(),
		ENQUEUE_VERSION,
		true
	);
	wp_enqueue_script('slick');

	// main js
	wp_register_script('main-js',
		get_bloginfo('template_url') . '/dist/js/main.js',
		$deps,
		ENQUEUE_VERSION,
		true
	);
	wp_enqueue_script('main-js');

	// main css
	wp_register_style('main-css',
		get_stylesheet_uri(),
		array(),
		ENQUEUE_VERSION
	);
	wp_enqueue_style('main-css');
}

// Custom Post Types
function custom_register_post_types() {

	// Products
	register_post_type('products', array(
		'labels' => array(
			'name' => __( 'Products' ),
			'singular_name' => __( 'Product' )
		),
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'query_var'             => true,
		'menu_icon' 						=> 'dashicons-lightbulb',
		'capability_type'       => 'post',
		'has_archive'						=> true,
		'menu_position'         => null,
		'exclude_from_search'   => false,
		'rewrite' 							=> array( 'with_front' => false, 'slug' => 'products' ),
		'supports' 							=> array( 'title', 'editor', 'thumbnail' ),
		'taxonomies' 						=> array( 'technologies_category' )
	));

}
add_action('init', 'custom_register_post_types');


// Custom Taxonomies
function custom_register_taxonomies() {

	// Products Categories
	register_taxonomy(
		'products_category',
		array( 'products' ),
		array(
			'labels'	=> array(
				'name' => 'Categories',
				'singular_name' => 'Category',
			),
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'hierarchical' => true,
			'rewrite' => array( 'slug' => 'products-category' )
		)
	);

}
add_action('init', 'custom_register_taxonomies');





// Page Meta Title
add_filter( 'wp_title', 'engle_filter_wp_title' );
function engle_filter_wp_title( $title ) {
	return $title . esc_attr( get_bloginfo( 'name' ) );
}


// SVG Upload
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


// Post Navigation
function post_navigation() {
	$prev_page = get_previous_posts_link('<svg class="post-grid--icon icon-arrow-left"><use xlink:href="#icon-arrow-left"></use></svg> Previous Posts');
	$next_page = get_next_posts_link('More Posts <svg class="post-grid--icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg>');
	if($prev_page || $next_page) {
		echo '<div class="post-grid-nav">';
		if ($prev_page) {
			echo  '<div class="post-grid-nav--item">' . $prev_page . '</div>';
		} else {
			echo '<div class="post-grid-nav--item"><svg class="post-grid-nav--icon icon-arrow-left"><use xlink:href="#icon-arrow-left"></use></svg> Previous Posts</div>';
		}
		if ($next_page) {
			echo  '<div class="post-grid-nav--item">' . $next_page . '</div>';
		} else {
			echo '<div class="post-grid-nav--item">More Posts <svg class="post-grid-nav--icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg></div>';
		}
		echo '</div>';
	}
}


// Image Sizes
add_image_size( 'post-grid-thumb', 410, 300, true );


// Default blog image
function get_default_blog_image($size=null){
	static $image_id;

	if(is_null($image_id))
		$image_id = (int) get_field('default_image', 'options');

	$image = wp_get_attachment_image_src($image_id, $size);
	return $image[0];
}


// ACF Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
