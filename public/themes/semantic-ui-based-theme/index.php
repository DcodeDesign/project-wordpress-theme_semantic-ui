<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package semantic_ui_based_theme
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php
		get_template_part('template-parts/header', 'home');
	?>
	<?php
		get_template_part('template-parts/articles', 'infinityscroll');
	?>
</main><!-- #main -->
<?php
//get_sidebar();
get_footer();
