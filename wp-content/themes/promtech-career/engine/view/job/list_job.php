<?php $main = new Main(); ?>
<input type="hidden" name="dir" value="<?= get_template_directory_uri(); ?>">

<?php foreach($args['items'] as $key => $job) : ?>
<div class="col-12 col-md-6 col-lg-4 items" id="career_<?= $key+1; ?>">
    <div class="careers-element-container">
        <div class="career-element">
            <div class="career-element-content">
                <div class="career-element-top">
                    <div class="career-big-img">
                        <a href="<?= $job->item['url']; ?>">
                            <img src="<?= (!empty($job->item['news_img_url'])) ? $job->item['news_img_url'] : get_template_directory_uri() . '/assets/img/stub440x290.jpg'; ?>" alt="<?= $job->post_title; ?>" class="career-title-img">
                        </a>
                    </div>
                    <div class="career-company">
                        <a href="<?= $job->item['company_url']; ?>">
                            <img src="<?= $job->item['logo_company_ulr']; ?>" alt="<?= $job->item['name_company']; ?>" class="career-company-img">
                        </a>
                    </div>
                </div>
                <div class="career-element-middle">
                    <div class="career-middle-title">
                        <a href="<?= $job->item['url']; ?>"><?= $job->post_title; ?></a>
                    </div>
                    <div class="career-middle-salary">
                        <p>
                            <?php if(!empty($job->item['salary_from'])) echo "от " . $job->item['salary_from']; ?> 
                            <?php if(!empty($job->item['salary_to'])) echo " до " . $job->item['salary_to']; ?> 
                            <?php if(!empty($job->item['salary_from']) || !empty($job->item['salary_to'])) echo "  руб. на руки"; ?> 
                        </p>
                    </div>
                    <div class="career-middle-divider"></div>
                    <div class="career-middle-about">
                        <p>Требуемый опыт работы: <?= $job->item['experience']; ?>. <?= $job->item['work_schedule']; ?></p>
                    </div>
                    <div class="career-middle-map">
                        <span class="icon-map"></span>
                        <p><?= $job->item['company_address']; ?></p>
                    </div>
                </div>
                <div class="flex-1"></div>
                <div class="career-element-bottom">
                    <div class="d-flex career-bottom">
                        <button class="btn orange-btn" data-bs-toggle="modal" data-bs-target="#modal__form">Откликнуться</button>
                        <a href="<?= $job->item['url']; ?>" class="link see-more">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? endforeach; ?>


