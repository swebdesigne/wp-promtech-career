
<?php
$main = new Main();
$company = $main->init('Company', '', '');
$company->getAboutCompany(-1);
$company->get_list(-1);
$company->interview(-1);

/*
Template Name: Детальная страница компании
*/
?>
<? get_header(); ?>

<div class="container">
    <div class="about__slider">
        <?php foreach($company->getData('about')->slider as $slider) : ?>
        <div>
            <div class="main-photo d-flex" style="background-image:url(<?= home_url( '/' ) ?>wp-content/uploads/<?= $slider; ?>)">
                <div class="main-photo__logo"><img src="<?= $company->getData('about')->logo_url ?>" alt=""></div>
                <div class="main-photo__title photo-title">
                    <div class="photo-title__text"><?= $company->getData('about')->post_title; ?></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="options options2">
        <div class="requirements-subtitle">Телефоны</div>
        <div class="requirements-subtitle__desc">
            <?php foreach($company->getData('about')->phones as $phone) : ?>
            <a href="tel:<?= Tools::clearPhone($phone); ?>"><?= $phone; ?></a></br>
            <?php endforeach; ?>
        </div>
        <div class="requirements-subtitle">Адрес</div>
        <div class="requirements-subtitle__desc"><?= $company->getData('about')->address; ?></div>
        <div class="requirements-subtitle">Почта:</div>
        <div class="requirements-subtitle__desc">
            <?php foreach($company->getData('about')->email as $email) : ?>
            <a href="mailto:><?= $email; ?>"><?= $email; ?></a>
            <?php endforeach; ?>
        </div>
        <div class="requirements-subtitle">Сайт:</div>
        <div class="requirements-subtitle__desc"><a href="<?= str_replace("https://", "", $company->getData('about')->site); ?>"><?= $company->getData('about')->site; ?></a></div>

        <a href="<?= home_url( '/' ) ?>vacansii/?company=<?= $company->getData('about')->post_title; ?>" class="requirements__btn btn orange-btn">Вакансии компании</a>
        <p class="requirements__share">Поделиться в социальных сетях</p>
        <div class="ya-share2" data-curtain data-shape="round" data-services="facebook,vkontakte,odnoklassniki,whatsapp,telegram"></div>
    </div>
    <?= $company->getData('about')->post_content; ?>
    <div class="clearfix"></div>
    <div class="iampromtex">
        <h2 class="plane-title">#ЯПромтех</h2>
        <div class="iampromtex__items d-flex">
            <?php foreach($company->interview_of_company($company->getData('about')->post_title) as $interview) : ?>
            <div class="iampromtex_item iampromtex-item">
                <div class="iampromtex-item__img"><img src="<?= $interview->logo_url; ?>" alt="<?= $interview->post_title; ?>"></div>
                <div class="iampromtex-item__title">
                    <ul>
                        <li><?= $interview->employee; ?></li>
                    </ul>
                </div>
                <div class="iampromtex-item__subtitle"><?= $interview->post_title; ?></div>
                <div class="iampromtex-item__desc"><?= $interview->short_text; ?></div>
                <div class="iampromtex-item__readmore"><a href="<?= home_url( '/' ) ?>?interview=<?= $interview->post_title; ?>">Читать полностью</a></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<? get_footer(); ?>