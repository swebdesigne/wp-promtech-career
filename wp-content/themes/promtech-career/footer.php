<?php 
	$main = new Main(); 
	$contacts = $main->init("Contacts", '', ''); 
?>
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
						<a href="" class="footer-logo">
							<img src="<?= get_template_directory_uri(); ?>/assets/img/index/aero.svg" alt="">
						</a>
					</div>
					<div class="footer-col-bottom">
						<div class="copyright">
							<div class="copy">
								<p>Корпорация "Промтех" | &copy; <?= date("Y"); ?></p>
							</div>
							<div class="politics">
								<a href="#">Политика конфиденциальности</a>
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
							<form action="">
								<div class="subscribe-row">
									<input type="text" placeholder="Ваш e-mail" class="subscribe-input">
									<input type="submit" value="Подписаться" class="btn subscribe-btn orange-btn">
								</div>
							</form>
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

</body>
</html>
