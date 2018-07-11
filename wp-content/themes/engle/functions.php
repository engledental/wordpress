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

	// fonts css
	wp_enqueue_style('google-fonts',
		'https://fonts.googleapis.com/css?family=Roboto:100,400,400i,700,700i',
		false
	);

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


// Numeric Pagination
function pagination($pages = '', $range = 4) {
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if(1 != $pages) {
		echo "<div class=\"pager\"><ul>";
		if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' class=\"pager__direction\">&lsaquo;</a></li>";

		for ($i=1; $i <= $pages; $i++) {
		 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
		   echo ($paged == $i)? "<li class=\"is-current\"><span>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
		 }
		}

		if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\" class=\"pager__direction\">&rsaquo;</a></li>";
		echo "</ul></div>\n";
	}
}


// Image Sizes
add_image_size( 'product-thumb', 256, 288 );
add_image_size( 'product-thumb-2x', 512, 576 );

add_image_size( 'product-image', 380, 346 );
add_image_size( 'product-image-2x', 760, 692 );

add_image_size( 'catalog-cover', 573, 740 );
add_image_size( 'catalog-cover-2x', 1146, 1480 );

add_image_size( 'upholstery-thumb', 573, 377, true );
add_image_size( 'upholstery-thumb-2x', 1146, 754, true );

add_image_size( 'color-thumb', 194, 194, true );
add_image_size( 'color-thumb-2x', 388, 388, true );

add_image_size( 'hero-bg', 1000, 562, true );
add_image_size( 'hero-bg-2x', 2000, 1124, true );


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


// Remove ninja form stylesheets
function wpgood_nf_display_enqueue_scripts(){
  wp_dequeue_style( 'nf-display' );
}
add_action( 'nf_display_enqueue_scripts', 'wpgood_nf_display_enqueue_scripts');
