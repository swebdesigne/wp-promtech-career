<section class="faq-section">
	<div class="container">
		<div class="index-title col2">
			<div class="row">
				<div class="col-12 col-md-8">
					<h2 class="plane-title">Часто задаваемые вопросы</h2>
				</div>
			</div>
		</div>
		<div class="faq-section-content">
			<div class="row">
				<div class="col-12 col-md-8 col-lg-8">
					<div class="faq-content-accordion">
						<!-- FAQ ACCORDION -->
						<div class="accordion" id="faqAccordion">
							<!-- base faq card -->
                            <?php foreach($args['faq'] as $key => $arg) : ?>
                            <div class="faq-card">
                                <div class="faq-title" id="heading<?= $key; ?>">
                                    <button class="faq-btn" type="button" data-bs-toggle="collapse" data-target="#collapse<?= $key; ?>" 
                                     aria-expanded="<?php echo ($key == 0) ? true : false; ?>" aria-controls="collapse<?= $key; ?>">
                                    <?= $arg->post_title; ?>
                                    </button>
                                </div>
                                <div id="collapse<?= $key; ?>" class="collapse <?php if($key == 0) {?>show<?}?>" aria-labelledby="heading<?= $key; ?>" data-parent="#faqAccordion">
                                    <div class="faq-body">
                                        <p><?= nl2br($arg->answ); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
							<!-- end base faq card -->
						</div>
						<!-- END FAQ ACCORDION -->
					</div>
				</div>
				<div class="col-12 col-md-4 col-lg-4">
					<?= $args['have_question']->view('have_question'); ?>
				</div>
			</div>
		</div>
	</div>
</section>