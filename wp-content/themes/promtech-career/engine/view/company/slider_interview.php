<div class="corporation-interview">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-12 col-md-10">
				<div class="title-block title-block__arrow">
					<div class="plane-title">
						<h2>Интервью</h2>
					</div>
					<div class="title-arrows">
						<div class="title-arrow__prev">
							<a href="javascript:slickPrev('#corporationSlider')">
								<span class="icon-left"></span>
							</a>
						</div>
						<div class="title-arrow__next">
							<a href="javascript:slickNext('#corporationSlider')">
								<span class="icon-right"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="corporation-slider">
		<div id="corporationSlider">
            <?php foreach($args['interview'] as $arg) : ?>
			<div class="corporation-slider__item">
				<div class="corporation-item">
					<div class="corporation-item__photo">
						<img src="<?= $arg->logo_url; ?>" alt="">
						<div class="corporation-photo__desc">
							<h4><?= $arg->post_title; ?></h4>
							<p><?= $arg->employee; ?></p>
						</div>
					</div>
					<div class="container">
						<div class="corporation-item__desc">
							<div class="corporation-desc__text">
								<p><?= $arg->short_text; ?></p>
							</div>
							<div class="corporation-desc__link">
								<a href="../?interview=<?=basename( $arg->review_url ) ?>" class="link">Читать полностью</a>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php endforeach; ?>
		</div>
	</div>
</div>
