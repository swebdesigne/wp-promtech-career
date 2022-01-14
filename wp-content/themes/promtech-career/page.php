<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package promtech
 */
get_header();
?>

<?php
		$dir = 'engine/view/';
		$basename = basename($_SERVER['REDIRECT_URL']);
		// $basename = basename($_SERVER['REQUEST_URI']);
		// Tools::mdd($_SERVER);
		while ( have_posts() ) :
			the_post();

			if (get_post_type() == 'page' && $basename == 'news') get_template_part($dir.'news/news');
			if (get_post_type() == 'page' && $basename == 'obuchenie') get_template_part($dir.'employess_and_partners/obuchenie');
			if (get_post_type() == 'page' && $basename == 'sport') get_template_part($dir.'employess_and_partners/sport');
			if (get_post_type() == 'page' && $basename == 'sotrudnichestvo-s-vuzami-i-ssuzami') get_template_part($dir.'employess_and_partners/sotrudnichestvo_s_vuzami_i_ssuzami');
			if (get_post_type() == 'page' && $basename == 'my-v-sotssetyakh') get_template_part($dir.'employess_and_partners/social_network');
			if (get_post_type() == 'page' && $basename == 'est-ideya') get_template_part($dir.'employess_and_partners/have_idea');

		endwhile; // End of the loop.
		?>
<?php
// get_sidebar();
get_footer();
