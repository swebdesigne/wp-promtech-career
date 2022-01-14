
<?php
$main = new Main();
$interview = $main->init('Company', '', '');
$interview->single_interview(-1);
/*
Template Name: Детальная страница интервью
*/
?>
<? get_header(); ?>
<section class="news news__detail">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="title-block">
					<div class="plane-title">
						<h1><?= $interview->getData('single_interview')->post_title; ?></h1>
					</div>
					<div class="news-detail__content">
						<div class="news-detail__date">
							<p><? the_date('d.m.y'); ?></p>
						</div>
						<div class="news-detail__image">
							<a class="fb-img" href="<?= $interview->getData('single_interview')->large; ?>">
								<img src="<?= $interview->getData('single_interview')->large; ?>" alt=""/>
							</a>
						</div>
						<div class="news-detail__text">
							<p><?= $interview->getData('single_interview')->post_content?></p>
						</div>
						<div class="news-detail__bottom">
							<div class="news-bottom article__back">
								<a href="javascript:history.back(1);">
									<span class="icon-left"></span><span class="text">назад</span>
								</a>
							</div>
							<div class="news-bottom__socials">
								<p class="news-socials__title">Поделиться в социальных сетях</p>
								<div class="ya-share2" data-curtain data-shape="round" data-services="facebook,vkontakte,odnoklassniki,whatsapp,telegram"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<? get_footer(); ?>