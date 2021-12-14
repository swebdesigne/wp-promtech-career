<section class="index-slider">
    <div class="hidden-logos d-none">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="" class="hidden-logo">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/index/dkz.svg" alt="">
                </a>
                <a href="" class="hidden-logo">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/index/dzkt.svg" alt="">
                </a>
                <a href="" class="hidden-logo">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/index/kzck.svg" alt="">
                </a>
                <a href="" class="hidden-logo">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/index/promtex.svg" alt="">
                </a>
                <a href="" class="hidden-logo">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/index/promtex_career.svg" alt="">
                </a>
                <a href="" class="hidden-logo">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/index/ps.svg" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="slider-bg">
        <div id="mainSlider">
            <?php foreach ($args as $arg) :?>
            <div class="main-slider-item">
                <img src="<?= $arg->slideURL; ?>" alt="<?= $arg->post_title; ?>">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="slider-title">
        <h1>ВАКАНСИИ</h1>
        <p class="small-slogan">Стань частью корпорации <span class="orange">Промтех</span></p>
        <div class="run-line">
            <ul>
                <li>ОКБ Аэрокосмические системы</li>
                <li>Промтех-Дубна</li>
                <li>Дубненский кабельный завод</li>
                <li>Дубненский завод коммутационной техники</li>
                <li>Простех-Сервис</li>
                <li>Промтех-Ульяновск</li>
                <li>Промтех-Иркутск</li>
            </ul>
        </div>
    </div>
    <div class="slider-bg cloud"></div>
</section>