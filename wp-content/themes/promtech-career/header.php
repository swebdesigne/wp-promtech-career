
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
	
</head>
	
<?php 
// spl_autoload_register(function ($class_name) {
//     include $class_name . '.php';
// });
get_template_part("engine"); ?>
<body <?php body_class(); ?>>
<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
				<?php the_custom_logo(); ?>
			</div>
			<div class="col-lg-8">
				<nav><?php wp_nav_menu(['theme-location' => 'Header menu', 'container' => false, 'menu_class' => 'menu_header']);?></nav>
			</div>
			<div class="col-lg-2">заказать звонок</div>
		</div>
	</div>
</header>


