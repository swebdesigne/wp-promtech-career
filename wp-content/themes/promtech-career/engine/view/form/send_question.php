<section class="question-section">
    <div class="row question-bg no-gutters">
        <div class="question-bg-left"></div>
        <div class="question-bg-right"></div>
        <div class="col-12 question-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <div class="question-about-col">
                            <h4>Нет подходящей вакансии?</h4>
                            <p>Напишите нам. Мы всегда ищем лучших специалистов!</p>
                            <ul class="question-about-contacts">
                                <li class="d-flex">
                                    <span class="icon-phone"></span>
                                    <div class="question-contact d-flex flex-column">
                                        <b>Телефоны</b>
                                        <?php foreach($args['contacts']->getPhone() as $phone) : ?>
                                        <a href="tel:<?= Tools::clearPhone($phone); ?>"><?= $phone; ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <span class="icon-envelope"></span>
                                    <div class="question-contact d-flex flex-column">
                                        <b>Электронная почта:</b>
                                        <?php foreach($args['contacts']->getMail() as $mail) : ?>
                                        <a href="mailto:<?= $mail; ?>"><?= $mail; ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </li>
                            </ul>
                            <div class="question-about-links">
                                <a href="" class="chevron-link"><span>Узнать подробнее о компании</span></a>
                                <a href="" class="chevron-link"><span>Все компании</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1">
                       <?= $args['this']->view('fill_anketa'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>