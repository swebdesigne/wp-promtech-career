<?php $main = new Main();
$contacts = $main->init("Contacts", '', ''); 
/*
Template Name: Целевое обучение
*/
get_header(); ?>
<div class="container">
    <div class="targeted-training d-flex">

        <div class="targeted-training__left targeted-training-left">
            <h2 class="plane-title">Целевое <br> обучение</h2>
            <div class="targeted-training-left__desc">Подать заявку на заключение целевого договора <br> могут абитуриенты, студенты вузов и колледжей.</div>
            <button class="requirements__btn btn orange-btn" data-bs-toggle="modal" data-bs-target="#entier__form">Подать заявку</button>

            <!-- Modal -->
            <div class="modal fade" id="targeted-respond" tabindex="-1" role="dialog" aria-labelledby="targeted-respond-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="targeted-respond-title">Отправить заявку на <br> целевой договор</h5>
                            <button type="button" class="icon-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="question-form-container">
                                <!-- main->init('Form', 'form', '')->view('send_order'); ?> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="targeted-training__right targeted-training-right">
            <div class="targeted-training-right__img">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/targeted-training/targeted-training.png" alt="">
            </div>
        </div>

    </div>
</div>
<div class="subtract" style="margin-top: -90px;"></div>
<div class="container">
    <div class="targeted-training-advantages d-flex">
        <div class="targeted-training-advantages__left targeted-training-left">
            <div class="targeted-training-left__title">Преимущества целевого обучения</div>
            <div class="targeted-training-left__items">
                <div class="targeted-training-left__item targeted-training-item d-flex">
                    <div class="targeted-training-item__icon"><span class="icon-portfolio"></span></div>
                    <div>
                        <div class="targeted-training-item__title">Гарантия трудоустройства</div>
                        <div class="targeted-training-item__desc">на крупное, стабильное предприятие</div>
                    </div>
                </div>
                <div class="targeted-training-left__item targeted-training-item d-flex">
                    <div class="targeted-training-item__icon"><span class="icon-timetable"></span></div>
                    <div>
                        <div class="targeted-training-item__title">Опытные наставники</div>
                        <div class="targeted-training-item__desc">поддержат во время прохождения практик и стажировок</div>
                    </div>
                </div>
                <div class="targeted-training-left__item targeted-training-item d-flex">
                    <div class="targeted-training-item__icon"><span class="icon-plant"></span></div>
                    <div>
                        <div class="targeted-training-item__title">Карьерный рост</div>
                        <div class="targeted-training-item__desc">начиная с 3 курса «целевикам», сдавшим сессию на 4 и 5, гарантирована <br> возможность прохождения оплачиваемой стажировки</div>
                    </div>
                </div>
                <div class="targeted-training-left__item targeted-training-item d-flex">
                    <div class="targeted-training-item__icon"><span class="icon-wallet"></span></div>
                    <div>
                        <div class="targeted-training-item__title">Финансовая поддержка</div>
                        <div class="targeted-training-item__desc">Дополнительная стипендия выплачивается 2 раза в год, по итогам успешной сдачи сессии</div>
                    </div>
                </div>
            </div>
            <div class="targeted-training-left__presentation targeted-training-presentation d-flex">
                <div class="targeted-training-presentation__icon"><a href="https://www.youtube.com/watch?v=BQbVk5RaXCA" target="_blank" class="no-border"><span class="icon-play"></span></a></div>
                <div class="targeted-training-presentation__link"><a href="https://www.youtube.com/watch?v=BQbVk5RaXCA" target="_blank">Смотреть презентацию</a></div>
            </div>
        </div>
        <div class="targeted-training-advantages__right targeted-training-right">
            <div class="question-form-container">
                <h4>Отправить заявку на целевой договор</h4>
                <?php  $main->init('Form', 'form', '')->view('send_order'); ?>
            </div>
        </div>
    </div>
</div>
<div class="subtract_2"></div>
<div class="container">
    <div class="targeted-training-feedback">
        <div class="targeted-training-feedback__text">По вопросам заключения целевых договоров с вами на связи</div>
        <div class="targeted-training-feedback__name"><?= $contacts->get_entire_learning_hr(); ?></div>
        <div class="targeted-training-feedback__phone"><a href="tel:<?= Tools::clearPhone($contacts->get_entire_learning_phone()); ?>"><?= $contacts->get_entire_learning_phone(); ?></a></div>
        <div class="targeted-training-feedback__email"><a href="mailto:<?= $contacts->get_entire_learning_mail(); ?>"><?= $contacts->get_entire_learning_mail(); ?></a></div>
    </div>
</div>
<? get_footer();