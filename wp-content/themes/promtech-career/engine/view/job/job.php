<section class="index-career">
    <div class="container">
        <ul class="careers-filter">
            <?php foreach($args as $arg) : ?>
                <li>
                    <a href="javascript:careerFilter('Инженерия')" class="careers-filter-item">Инженерия</a>
                </li>
            <?php endforeach; ?>
            <li>
                <a href="javascript:careerFilter('Производство')" class="careers-filter-item">Производство</a>
            </li>
            <li>
                <a href="javascript:careerFilter('Начало карьеры')" class="careers-filter-item">Начало карьеры</a>
            </li>
            <li>
                <a href="javascript:careerFilter('Административный персонал')" class="careers-filter-item">Административный персонал</a>
            </li>
            <li>
                <a href="javascript:careerFilter('Информационные технологии')" class="careers-filter-item">Информационные технологии</a>
            </li>
            <li>
                <a href="javascript:careerFilter('Коммерция')" class="careers-filter-item">Коммерция</a>
            </li>
        </ul>
        <div class="careers-list">
            <div class="row">
                <?
                $career = array(
                    array(
                        "img" => "images/img/index/career1.jpg",
                        "company" => "images/img/index/promtex.svg",
                        "name" => "Инженер-технолог",
                        "zp" => "от 40 000 до 90 000 руб. на руки",
                        "about" => "Требуемый опыт работы: 3–6 лет. Полная занятость, полный день",
                        "map" => "Дубна, Московской область",
                    ),
                    array(
                        "img" => "images/img/index/career2.jpg",
                        "company" => "images/img/index/aero.svg",
                        "name" => "Инженер-конструктор по разработке трубопроводных систем",
                        "zp" => "от 50 000 до 130 000 руб. на руки",
                        "about" => "Требуемый опыт работы: 3–6 лет. Полная занятость, полный день",
                        "map" => "Дубна, Московской область",
                    ),
                    array(
                        "img" => "images/img/index/career3.jpg",
                        "company" => "images/img/index/kzck.svg",
                        "name" => "Ведущий инженер-схемотехник",
                        "zp" => "от 100 000 руб. на руки",
                        "about" => "Требуемый опыт работы: 3–6 лет. Полная занятость, полный день",
                        "map" => "Дубна, Московской область",
                    ),
                    array(
                        "img" => "images/img/index/career4.jpg",
                        "company" => "images/img/index/promtex_career.svg",
                        "name" => "Инженер-конструктор распределительных устройств",
                        "zp" => "от 50 000 до 100 000 руб. на руки",
                        "about" => "Требуемый опыт работы: 3–6 лет. Полная занятость, полный день",
                        "map" => "Дубна, Московской область",
                    ),
                    array(
                        "img" => "images/img/index/career5.jpg",
                        "company" => "images/img/index/aero.svg",
                        "name" => "Специалист по внешней кооперации",
                        "zp" => "от 40 000 до 70 000 руб. на руки",
                        "about" => "Требуемый опыт работы: 3–6 лет. Полная занятость, полный день",
                        "map" => "Дубна, Московской область",
                    ),
                    array(
                        "img" => "images/img/index/career6.jpg",
                        "company" => "images/img/index/kzck.svg",
                        "name" => "Начальник КБ силовой электроники",
                        "zp" => "от 250 000 руб. на руки",
                        "about" => "Требуемый опыт работы: 3–6 лет. Полная занятость, полный день",
                        "map" => "Дубна, Московской область",
                    ),
                );
                ?>
                <?for ($i = 0; $i < count($career); $i++){
                    $res = $career[$i];?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="careers-element-container">
                        <div class="career-element">
                            <div class="career-element-content">
                                <div class="career-element-top">
                                    <div class="career-big-img">
                                        <a href="#">
                                            <img src="<?=$res['img']?>" alt="" class="career-title-img">
                                        </a>
                                    </div>
                                    <div class="career-company">
                                        <a href="#">
                                            <img src="<?=$res['company']?>" alt="" class="career-company-img">
                                        </a>
                                    </div>
                                </div>
                                <div class="career-element-middle">
                                    <div class="career-middle-title">
                                        <a href=""><?=$res['name']?></a>
                                    </div>
                                    <div class="career-middle-salary">
                                        <p><?=$res['zp']?></p>
                                    </div>
                                    <div class="career-middle-divider"></div>
                                    <div class="career-middle-about">
                                        <p><?=$res['about']?></p>
                                    </div>
                                    <div class="career-middle-map">
                                        <span class="icon-map"></span>
                                        <p><?=$res['map']?></p>
                                    </div>
                                </div>
                                <div class="flex-1"></div>
                                <div class="career-element-bottom">
                                    <div class="d-flex career-bottom">
                                        <a href="#" class="btn orange-btn">Откликнуться</a>
                                        <a href="#" class="link see-more">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?}?>
                <div class="col-12 show-all-careers">
                    <div class="text-center">
                        <a href="#">Показать ещё вакансии</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

