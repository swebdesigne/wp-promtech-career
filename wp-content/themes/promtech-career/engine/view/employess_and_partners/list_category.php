<section class="corporation-cards">
	<div class="container">
		<div class="corporation-cards__list">
			<div class="row">
				<?php foreach($args['category'] as $employee) : ?>
                <? if ($employee->ID != 357 && $employee->ID != 360) : ?>
				<div class="col-12 col-md-6 col-lg-4 corporation-margin">
					<div class="corporation-card">
                        <div class="corporation-element corporation-card__element">
                            <div class="corporation-element__top">
                                <a href="<?= $employee->category_url; ?>">
                                    <img src="<?= $employee->post_category_big; ?>" alt="" class="corporation-element__img">
                                </a>
                            </div>
                            <div class="corporation-element__middle">
                                <div class="corporation-element__title">
                                    <a href="<?= $employee->category_url; ?>"><?= $employee->post_title; ?></a>
                                </div>
                                <div class="corporation-element__desc">
                                    <p><?= $employee->short_text; ?></p>
                                </div>
                                <div class="flex-1"></div>
                            </div>
                            <div class="flex-1"></div>
                            <div class="corporation-element__bottom">
                                <a href="<?= $employee->category_url; ?>" class="btn orange-btn">Подробнее</a>
                            </div>
                        </div>
					</div>
				</div>
                <?php endif; ?>
				<? endforeach; ?>
			</div>
		</div>
	</div>
</section>

