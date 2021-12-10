<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package business
 */

get_header();
?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

		<?php
		$dir = 'engine/view/';
		while ( have_posts() ) :
			the_post();

			if (get_post_type() == 'job') get_template_part($dir.'job/job-details');
			if (get_post_type() == 'brands') get_template_part($dir.'company/company-details');
			// if (get_post_type() == 'brands') get_template_part($dir.'company/company-details');
			// if (get_post_type() == 'brands') get_template_part( $dir.'company/company-details');
			
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
// the_post_navigation();

// If comments are open or we have at least one comment, load up the comment template.
// if ( comments_open() || get_comments_number() ) :
// 	comments_template();
// endif;

// get_sidebar();
