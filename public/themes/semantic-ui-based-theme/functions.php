<?php

/**
 * SEMANTIC UI BASED THEME functions and definitions
 *	
 * @package SEMANTIC_UI_BASED_THEME
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('semantic_ui_based_theme_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function semantic_ui_based_theme_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on UNDERSCORES BASED THEME, use a find and replace
		 * to change 'semantic_ui_based_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('semantic_ui_based_theme', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'Primary' => esc_html__('Primary', 'semantic_ui_based_theme'),
				'Secondary' => esc_html__('Secondary', 'semantic_ui_based_theme'),
			)
		);

		add_action('after_setup_theme', 'register_nav_menus', 0);

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
				'semantic_ui_based_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'semantic_ui_based_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function semantic_ui_based_theme_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('semantic_ui_based_theme_content_width', 640);
}
add_action('after_setup_theme', 'semantic_ui_based_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function semantic_ui_based_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'semantic_ui_based_theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'semantic_ui_based_theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'semantic_ui_based_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function semantic_ui_based_theme_scripts()
{
	wp_enqueue_style('semantic_ui_based_theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('sementic-ui-style', get_template_directory_uri() . '/semantic-ui/css/semantic.min.css');
	wp_enqueue_script("jquery");
	wp_enqueue_script('sementic-ui-script', get_template_directory_uri() . '/semantic-ui/js/semantic.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/customizer.js', array(), _S_VERSION, true);
	
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'semantic_ui_based_theme_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * remove emoji script
 */
require get_template_directory() . '/inc/emoji.php';

/**
 * remove rss
 */
require get_template_directory() . '/inc/rss.php';
/**
 * custom Navigation
 */
require get_template_directory() . '/inc/navigation-custom.php';

/**
 * Excerpt
 */
require get_template_directory() . '/inc/excerpt.php';


/**
 * Infinity Scroll
 */

function script_load_more($args = array()) {
   //initial posts load
   echo '<div id="ajax-primary" class="content-area ui container-cards">';
		echo '<div id="ajax-content" class="content-area ui link cards stackable centered container">';
		   ajax_script_load_more($args);
	   echo '</div>';
	echo '<a style="padding:20px;" href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" ><div class="ui active centered inline loader"></div></a>';
   echo '</div>';
}

/*
 * create short code.
 */
add_shortcode('ajax_posts', 'script_load_more');

/*
 * load more script call back
 */
function ajax_script_load_more($args) {
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$ajax = true;
		$paged = 0;
    }
    //number of posts per page default
    $num = 6;
	//page number
	
	$paged = $_POST['page'] + 1;
    //args
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'paged'=>$paged
    );
    //query
    $query = new WP_Query($args);
    //check
    if ($query->have_posts()):
        //loop articales
        while ($query->have_posts()): $query->the_post();
            //include articles template
            include 'template-parts/article-single.php';
        endwhile;
    else:
        echo 0;
    endif;
    //reset post data
    wp_reset_postdata();
    //check ajax call
    if($ajax) die();
}

/*
 * load more script ajax hooks
 */
add_action('wp_ajax_nopriv_ajax_script_load_more', 'ajax_script_load_more');
add_action('wp_ajax_ajax_script_load_more', 'ajax_script_load_more');

/*
 * enqueue infinity-sroll script js 
 */
add_action( 'wp_enqueue_scripts', 'ajax_enqueue_script' );
/*
 * enqueue js script call back
 */
function ajax_enqueue_script() {
    wp_enqueue_script( 'script_ajax', get_theme_file_uri( '/js/infinity-scroll.js' ), array( 'jquery' ), '1.0', true );
}


/**
 * search
 */
add_filter( 'posts_join', 'search_join', 10, 2 );
/**
 * Joins the terms, term_relationship, and term_taxonomy tables.
 *
 * @global $wpdb
 *
 * @param string $join The sql JOIN clause.
 * @param object $query The current WP_Query instance.
 *
 * @return string $join
 */
function search_join( $join, $query ) {

    global $wpdb;

    if ( is_main_query() && is_search() ) {

        $join .= "
        LEFT JOIN
        (
            {$wpdb->term_relationships}
            INNER JOIN
                {$wpdb->term_taxonomy} ON {$wpdb->term_taxonomy}.term_taxonomy_id = {$wpdb->term_relationships}.term_taxonomy_id
            INNER JOIN
                {$wpdb->terms} ON {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id
        )
        ON {$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id ";

    }

    return $join;

}

add_filter( 'posts_where', 'custom_posts_where', 10, 2 );
/**
 * Callback for WordPress 'posts_where' filter.
 *
 * Modify the where clause to include searches against a WordPress taxonomy.
 *
 * @global $wpdb
 *
 * @param string $where The where clause.
 * @param WP_Query $query The current WP_Query.
 *
 * @return string The where clause.
 */
function custom_posts_where( $where, $query ) {

    global $wpdb;

    if ( is_main_query() && is_search() ) {

        // get additional where clause for the user
        $user_where = custom_get_user_posts_where();

        $where .= " OR (
                        {$wpdb->term_taxonomy}.taxonomy IN( 'category', 'post_tag' )
                        AND
                        {$wpdb->terms}.name LIKE '%" . esc_sql( get_query_var( 's' ) ) . "%'
                        {$user_where}
                    )";

    }

    return $where;

}

function custom_get_user_posts_where() {

  global $wpdb;

  $user_id = get_current_user_id();
  $sql     = '';
  $status  = array( "'publish'" );

  if ( $user_id ) {

      $status[] = "'private'";

      $sql .= " AND {$wpdb->posts}.post_author = {$user_id}";

  }

  $sql .= " AND {$wpdb->posts}.post_status IN( " . implode( ',', $status ) . " ) ";

  return $sql;

}

add_filter( 'posts_groupby', 'custom_posts_groupby', 10, 2 );
/**
 * Callback for WordPress 'posts_groupby' filter.
 *
 * Set the GROUP BY clause to post IDs.
 *
 * @global $wpdb 
 *
 * @param string $groupby The GROUPBY caluse.
 * @param WP_Query $query The current WP_Query object.
 *
 * @return string The GROUPBY clause.
 */
function custom_posts_groupby( $groupby, $query ) {

  global $wpdb;

  if ( is_main_query() && is_search() ) {
      $groupby = "{$wpdb->posts}.ID";
  }

  return $groupby;

}