<section class="corporation-cards">
	<div class="container">
		<div class="corporation-cards__list">
			<div class="row">
				<?php foreach($args['company'] as $company) : ?>
				<div class="col-12 col-md-6 col-lg-4 corporation-margin">
					<div class="corporation-card">
                        <div class="corporation-element corporation-card__element">
                            <div class="corporation-element__top">
                                <a href="<?= $company->company_url; ?>">
                                    <img src="<?= $company->logo_url; ?>" alt="" class="corporation-element__img">
                                </a>
                            </div>
                            <div class="corporation-element__middle">
                                <div class="corporation-element__title">
                                    <a href="<?= $company->company_url; ?>"><?= $company->post_title; ?></a>
                                </div>
                                <div class="corporation-element__desc">
                                    <p><?= $company->short_text; ?></p>
                                </div>
                                <div class="flex-1"></div>
                                <div class="corporation-element__map">
                                    <span class="icon-map"></span>
                                    <p><?= $company->address; ?></p>
                                </div>
                            </div>
                            <div class="flex-1"></div>
                            <div class="corporation-element__bottom">
                                <a href="<?= $company->company_url; ?>" class="btn orange-btn">Подробнее</a>
                            </div>
                        </div>
					</div>
				</div>
				<? endforeach; ?>
			</div>
		</div>
	</div>
</section>

