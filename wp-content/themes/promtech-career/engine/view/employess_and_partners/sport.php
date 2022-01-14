<?php
   $main = new Main();
   $main->init('Employee', '', '')->get_single();
   Tools::mdd(get_post());
?>
<!-- <div class="container">
    <div class="sport d-flex">
        <div class="sport__left sport-left">
            <h2 class="plane-title">Промтех Спорт</h2>
            <div class="sport-left__desc">
                <ul>
                    <li>Тренировки и победы</li>
                    <li>Достижения и сплоченность</li>
                    <li>Поддержка коллектива и болельщиков</li>
                </ul>
            </div>
            <div class="sport-left__link"><a href="#">Вступить в сборную Промтех</a></div>
        </div>
        <div class="sport__right sport-right">
            <div class="sport-right__img"><a href="#"><img src="= get_template_directory_uri(); ?>/assets/img/sport/sport_img.png" alt="sport_img"></a></div>
        </div>
    </div>
    <div class="sport-types d-flex">
        <div class="sport-types__item sport-types-item">
            <div class="sport-types-item__img"><img src="= get_template_directory_uri(); ?>/assets/img/sport/voleyball.png" alt="voleyball"></div>
            <div class="sport-types-item__title">Волейбол Промтех</div>
            <div class="sport-types-item__subtitle">Сборная команда</div>
            <div class="sport-types-item__desc">Многократный победитель и призер муниципальных и областных соревнований</div>
        </div>
        <div class="sport-types__item sport-types-item">
            <div class="sport-types-item__img"><img src="= get_template_directory_uri(); ?>/assets/img/sport/basketball.png" alt="basketball"></div>
            <div class="sport-types-item__title">Баскетбол Промтех</div>
            <div class="sport-types-item__subtitle">Сборная команда</div>
            <div class="sport-types-item__desc">Многократный победитель и призер городских соревнований</div>
        </div>
        <div class="sport-types__item sport-types-item">
            <div class="sport-types-item__img"><img src="= get_template_directory_uri(); ?>/assets/img/sport/football.png" alt="football"></div>
            <div class="sport-types-item__title">Футбол Промтех</div>
            <div class="sport-types-item__subtitle">Сборная команда</div>
            <div class="sport-types-item__desc">Многократный победитель и призер городских и областных соревнований</div>
        </div>
    </div>
</div>
<div class="sport-join">
    <div class="container">
        <div class="sport-join__title">ХОЧУ В СБОРНУЮ!</div>
        <form action="" class="question-form">
            <input type="hidden" name="required" value="">
            <div class="form-row">
                <input type="submit" class="btn orange-btn form-item" value="Вступить  в сборную">
            </div>
        </form>
    </div>
</div> -->