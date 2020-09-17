<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package semantic_ui_based_theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', get_post_type());

		/*
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;
		*/

	endwhile;
	?>
</main>

<?php
// get_sidebar();
get_footer();
