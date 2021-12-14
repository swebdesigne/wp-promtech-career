
<?php $main = new Main(); ?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<div class="content">
			<!--  require("engine/templates/small_menu.php"); ?> -->
			<header class="header">
				<div class="container">
					<div class="d-flex justify-content-between align-items-center">
						<div class="logo <?if( esc_url( home_url( '/' ) ) == get_permalink() ){?>logo-hover<?}?>">
							<?php the_custom_logo(); ?>
							<?php if( esc_url( home_url( '/' ) ) == get_permalink() ) : ?>
							<div class="header-logos-close">
								<a href="javascript:closeLogos()">
									<span class="icon-close"></span>
								</a>
							</div>
							<?php endif; ?>
						</div>
						<?php $main->init("Menu", 'header_menu', -1)->view("header_menu"); ?>
						<div class="header-btn">
							<button class="btn orange-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Отправить резюме</button>
							<span class="menu-toggle"><i class="fa fa-bars"></i></span>
						</div>
					</div>
				</div>
			</header>
			<main <?if(esc_url( home_url( '/' ) ) != get_permalink()){?> class="inner" <?}?>>
