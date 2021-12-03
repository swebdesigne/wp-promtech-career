<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
				лого
			</div>
			<div class="col-lg-8">
				<nav><?php wp_nav_menu(['theme-location' => 'Header menu','container' => false,'menu_class' => 'menu_header']);?></nav>
			</div>
			<div class="col-lg-2">заказать звонок</div>
		</div>
	</div>
</header>

<?php bloginfo("name")?>
<?php bloginfo("description")?>

