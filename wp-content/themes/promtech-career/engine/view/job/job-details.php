
<?php
/*
Template Name: Вакансия
*/
 
$main = new Main();
$job = $main->init('Job', 'single_job', get_post())->getJob('job')['items'][0];
get_header(); ?>
<div class="container">
    <section class="vacancy-info main-photo d-flex" style="background: url(<?= (!empty($job->item['img_header'])) ? $job->item['img_header'] : get_template_directory_uri() . '/assets/img/stub440x290.jpg'; ?>) center no-repeat;">
        <div class="main-photo__logo"><img src="<?= $job->item['logo_company_ulr']; ?>" alt=""></div>
        <div class="main-photo__title photo-title">
            <div class="photo-title__text"><?= $job->post_title; ?></div>
        </div>
    </section>
</div>
<section class="requirements">
    <div class="container">
        <div class="requirements__wrapper">
            <div class="options">
                <div class="requirements-subtitle">Зарплата</div>
                <div class="requirements-subtitle__desc">
                    <?php 
                        if(!empty( $job->item['salary_from'] && !empty($job->item['salary_to']))) echo $job->item['salary_from'] . ' – ' . $job->item['salary_to'] . ' руб.';
                        else if(!empty( $job->item['salary_from'])) echo $job->item['salary_from'] . ' руб.';
                        else if(!empty($job->item['salary_to'])) echo $job->item['salary_to'] . ' руб.';
                    ?> 
                </div>
                <div class="requirements-subtitle">Опыт</div>
                <div class="requirements-subtitle__desc"><?= $job->experience; ?></div>
                <div class="requirements-subtitle">Занятость</div>
                <div class="requirements-subtitle__desc"><?= $job->work_schedule; ?></div>
                <div class="requirements-subtitle">Город</div>
                <div class="requirements-subtitle__desc"><?= $job->city; ?></div>
                <div class="requirements-subtitle">Телефон</div>
                <div class="requirements-subtitle__desc">С вами на связи HR Вера <br> <a href="tel:<?= Tools::clearPhone($job->item['company_phones'][0]); ?>"><?= $job->item['company_phones'][0]; ?></a></div>
                <button class="requirements__btn btn orange-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Откликнуться</button>

                <!-- Modal -->
                
                <p class="requirements__share">Поделиться вакансией</p>
                <div class="ya-share2" data-curtain data-shape="round" data-services="facebook,vkontakte,odnoklassniki,whatsapp,telegram"></div>
            </div>
            <div class="requirements__title"><?php if(count($job->item['responsibilities']) > 0) echo 'Обязанности'; ?></div>
            <div class="requirements__desc">
                <ul>
                    <?php foreach($job->item['responsibilities'] as $response) : ?>
                    <li><?= $response; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="requirements__title"><?php if(count($job->item['requirements']) > 0) echo 'Требования'; ?></div>
            <div class="requirements__desc">
                <ul>
                    <?php foreach($job->item['requirements'] as $requirement) : ?>
                    <li><?= $requirement; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="requirements__title"><?php if(count($job->item['conditions']) > 0) echo 'Мы предлагаем'; ?></div>
            <div class="requirements__desc">
                <ul>
                    <?php foreach($job->item['conditions'] as $condition) : ?>
                    <li><?= $condition; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
<?php $main->init('Faq', 'faq', -1)->view('faq'); ?>
<? get_footer(); ?>