<? get_header();
$main = new Main();
/*
Template Name: Стажировки
*/
?>
<div class="container">
    <div class="internship-main d-flex">
        <div class="internship-main__left internship-main-left">
            <h2 class="plane-title">
                <ul>
                    <li>Стажировка </li>
                    <li>подработка </li>
                    <li>практика</li>
                </ul>
            </h2>
            <div class="internship-main-left__desc">Ежегодно более 100 студентов вузов и колледжей <br> проходят практики и стажировки на предприятиях <br> ПРОМТЕХ.</div>
            <div class="internship-main-left__link"><a href="<?= get_template_directory_uri(); ?>/sotrudnikam-i-partneram/sotrudnichestvo-s-vuzami-i-ssuzami/">Сотрудничество с ВУЗАми и ССУЗАми</a></div>
        </div>
        <div class="internship-main__right internship-main-right">
            <div class="internship-main-right__items d-flex">
                <div class="internship-main-right__item"><img src="<?= get_template_directory_uri(); ?>/assets/img/internship/internship_1.png" alt="internship_1"></div>
                <div class="internship-main-right__item"><img src="<?= get_template_directory_uri(); ?>/assets/img/internship/internship_2.png" alt="internship_2"></div>
            </div>

            <div class="internship-main-right__items d-flex">
                <div class="internship-main-right__item"><img src="<?= get_template_directory_uri(); ?>/assets/img/internship/internship_3.png" alt="internship_3"></div>
                <div class="internship-main-right__item"><img src="<?= get_template_directory_uri(); ?>/assets/img/internship/internship_4.png" alt="internship_4"></div>
            </div>
        </div>
    </div>
</div>
<div class="subtract"></div>
<div class="container">
    <div class="internship-advantages">
        <div class="internship-advantages__title">Преимущества Промтех <br> стажировки</div>
        <div class="internship-advantages__items internship-advantages-items d-flex">
            <div class="internship-advantages-items__item internship-advantages-item">
                <div class="internship-advantages-item__icon"><span class="icon-wallet"></span></div>
                <div class="internship-advantages-item__title">Зарплата</div>
                <div class="internship-advantages-item__desc">Протмех стажировки оплачиваются</div>
            </div>
            <div class="internship-advantages-items__item internship-advantages-item">
                <div class="internship-advantages-item__icon"><span class=" icon-timetable"></span></div>
                <div class="internship-advantages-item__title">Гибкий график</div>
                <div class="internship-advantages-item__desc">Стажировку можно совмещать с учебой</div>
            </div>
        </div>
        <div class="internship-advantages__items internship-advantages-items d-flex">
            <div class="internship-advantages-items__item internship-advantages-item">
                <div class="internship-advantages-item__icon"><span class="icon-file"></span></div>
                <div class="internship-advantages-item__title">Опыт работы</div>
                <div class="internship-advantages-item__desc">Официальное трудоустройство, трудовой стаж идет во время учебы</div>
            </div>
            <div class="internship-advantages-items__item internship-advantages-item">
                <div class="internship-advantages-item__icon"><span class="icon-portfolio"></span></div>
                <div class="internship-advantages-item__title">Карьерный рост</div>
                <div class="internship-advantages-item__desc">обеспечен, успешно прошедшим стажировку. Каждый 2 стажер остается работать в штате компании</div>
            </div>
        </div>
    </div>
</div>
<div class="subtract_2"></div>
<section class="index-career internship-open">
    <div class="container">
        <h2 class="plane-title">Открытые стажировки</h2>
        <div class="careers-list">
            <div class="row">
                <?php $main->init('Job', 'internship', 3)->view('list_job'); ?>
                <div class="col-12 show-all-careers">
                    <div class="text-center">
                        <a href="#" id="show_more_internship">Показать ещё стажировки</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="internship-types">
        <div class="internship-types__items d-flex">
            <div class="internship-types__item internship-types-item">
                <div class="internship-types-item__title">
                    <ul>
                        <li>Стажировка</li>
                    </ul>
                </div>
                <div class="internship-types-item__desc">
                    <ul>
                        <li>Для студентов Вузов и колледжей, успешно закончивших 2 курс и старше</li>
                        <li>Срок стажировки – 3 месяца</li>
                        <li>Пройти стажировку можно в любое время</li>
                    </ul>
                </div>
            </div>
            <div class="internship-types__item internship-types-item">
                <div class="internship-types-item__title">
                    <ul>
                        <li>Практика</li>
                    </ul>
                </div>
                <div class="internship-types-item__desc">
                    <ul>
                        <li>Для студентов Вузов и колледжей</li>
                        <li>Срок и время прохождения практики устанавливаются учебным планом направления вашего Вуза или колледжа</li>
                    </ul>
                </div>
            </div>
            <div class="internship-types__item internship-types-item">
                <div class="internship-types-item__title">
                    <ul>
                        <li>Подработка</li>
                    </ul>
                </div>
                <div class="internship-types-item__desc">
                    <ul>
                        <li>Для студентов Вузов и колледжей</li>
                        <li>Гибкий график, подработка в свободное от учебы время</li>
                        <li>В компаниях корпорации есть проектные задачи, рассчитанные на студенческие силы и знания. Подработка оплачивается. Временных ограничений нет.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="internship-mailing">
    <div class="container">
        <div class="internship-mailing__title">Подпишись на рассылку</div>
        <div class="internship-mailing__desc">новых стажировок по почте</div>
        <form action="" class="question-form">
            <input type="hidden" name="required" value="">
            <div class="form-row">
                <input type="text" class="form-item" placeholder="Email *" id="" name="" required>
                <input type="submit" class="btn orange-btn form-item" value="Подписаться">
            </div>
        </form>
    </div>
</div>
<?php $main->init('Faq', 'faq', -1)->view('faq'); ?>
<? get_footer();