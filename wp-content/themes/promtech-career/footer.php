<?php 
	$main = new Main(); 
	$main->init("Company", '', '');
	$main->init("City", '', '');
	$contacts = $main->init("Contacts", '', ''); 
?>

<!-- Modals forms START -->
<div class="modal fade" id="modal__form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Заполните анкету</h5>
            <button type="button" class="icon-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <?php echo do_shortcode('[contact-form-7 id="442" title="Заполните анкету модалка"]'); ?>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="entier__form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Заполните заявку</h5>
            <button type="button" class="icon-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <?php echo do_shortcode('[contact-form-7 id="478" title="заявка на целевой договор модалка"]'); ?>
        </div>
        </div>
    </div>
</div>
<!-- Modals forms END -->

<!-- $main->init('Form', 'form', '')->view('modal_fill_anketa'); ?> -->
<?php if( esc_url( home_url( '/' ) ) == get_permalink() || basename(get_permalink()) == 'vacansii' || basename(get_permalink()) == 'sport') : ?>
<section class="slogan">
	<div class="container">
		<div class="text-center">
			<p class="slogan-text">Давай создавать будущее <span class="slogan-word orange">вместе!</span></p>
		</div>
	</div>
</section>
<?php endif; ?>
</main>
	</div> <!-- .content -->
	<footer class="footer">
		<div class="container">
		<div class="row footer-border">
			<div class="col-12 col-md-8 col-lg-5">
				<div class="footer-col col-politics">
					<div class="footer-col-top">
						<a href="#" class="footer-logo">
							<img src="<?= get_template_directory_uri(); ?>/assets/img/index/promtex_career.svg" alt="">
						</a>
						<!-- <a href="" class="footer-logo">
							<img src="<?= get_template_directory_uri(); ?>/assets/img/index/aero.svg" alt="">
						</a> -->
					</div>
					<div class="footer-col-bottom">
						<div class="copyright">
							<div class="copy">
								<p>Корпорация "Промтех" | &copy; <?= date("Y"); ?></p>
							</div>
							<div class="politics">
								<a href="<?= home_url( '/' )?>legal">Политика конфиденциальности</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-4 col-lg-3">
				<div class="footer-col col-contact">
					<ul class="footer-contacts">
						<li class="d-flex">
							<span class="footer-icon icon-phone"></span>
							<div class="footer-contact d-flex flex-column">
								<b>Телефоны</b>
								<?php foreach($contacts->getPhone() as $phone) : ?>
								<a href="tel:<?= Tools::clearPhone($phone); ?>"><?= $phone; ?></a>
								<?php endforeach; ?>
							</div>
						</li>
						<li class="d-flex">
							<span class="footer-icon icon-envelope"></span>
							<div class="footer-contact d-flex flex-column">
								<b>Электронная почта:</b>
								<?php foreach($contacts->getMail() as $mail) : ?>
								<a href="mailto:<?= $mail; ?>"><?= $mail; ?></a>
								<?php endforeach; ?>
							</div>
						</li>
						<li class="d-flex">
							<span class="footer-icon icon-map"></span>
							<div class="footer-contact d-flex flex-column">
								<b>Адрес:</b>
								<p><?= $contacts->getAddress(); ?></p>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-4">
				<div class="footer-col col-subscribe">
					<!-- require("engine/templates/mailing.php"); ?>
						require("engine/templates/socials.php"); ?> -->
					<section class="subscribe">
						<h4>Подписаться на рассылку новых вакансий</h4>
						<div class="subscribe-form">
							<div class="subscribe-row">
							<?php echo do_shortcode('[contact-form-7 id="276" title="Подписаться"]'); ?>
							</div>
						</div>
					</section>
					<section class="socials">
						<h4>Мы в соцсетях</h4>
						<div class="socials-list">
							<a href="" class="me-3 social">
								<span class="icon-insta"></span>
							</a>
							<a href="" class="me-3 social">
								<span class="icon-fb"></span>
							</a>
							<a href="" class="me-3 social">
								<span class="icon-vk"></span>
							</a>
							<a href="" class="me-3 social">
								<span class="icon-ok"></span>
							</a>
						</div>
					</section>
				</div>
			</div>
		</div>
		</div>
	</footer>
</div> <!-- .wrapper -->

<?php wp_footer(); ?>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="https://vk.com/js/api/openapi.js?169"></script>
<script type="text/javascript">VK.Widgets.Group("vk_groups", {mode: 4, wide: 1, width: "auto", height: "400", color3: 'FF8300'}, 176789683);</script>
<script type="text/javascript">
            $(document).ready(function() {
				$(".various").fancybox({
					maxWidth : 800,
					maxHeight : 600,
					fitToView : true,
					autoSize : true,
					closeClick : false,
					openEffect : 'none',
					closeEffect : 'none'
				});
			});
</script>
</body>
</html>
