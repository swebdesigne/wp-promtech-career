<?php 
$main = new Main();
$news = $main->init('News', '', '');
$news->set_news('photo', '');
$news->set_news('video', '');
$news->set_news('sort', '');
get_header();
$p = $news->getData('photo');
$v = $news->getData('video');
$sort = $news->getData('sort');
/*
Template Name: Новости
*/
// Tools::mdd($p);
?>
<section class="news">
	<div class="container">
    <input type="hidden" name="dir" value="<?= get_template_directory_uri(); ?>">
		<div class="row">
			<div class="col-12 col-lg-7">
            <?
                $tags = array("tag1", "tag2", "tag3");
                $news = array(
                    array(
                        "img" => "images/img/news/news1.jpg",
                        "title" => "Корпорация «ПРОМТЕХ»: четверть века уверенного набора высоты",
                        "data" => "28.07.2021",
                        "text" => "<p>Корпорация «Промышленные технологии» («Промтех»), которой в 2020 году исполнилось 25 лет, специализируется на разработке и производстве компонентов и систем для авиационной и ракетно-космической отрасли. В состав корпорации входят ОКБ «Аэрокосмические системы», производственные площадки в Иркутске, Дубне, Казани, Ульяновске, Воронеже и Комсомольске-на-Амуре, сервисные предприятия, осуществляющие техническое обслуживание и ремонт авиационной техники, логистические подразделения, обеспечивающие материальнотехническое сопровождение кооперации.</p>",
                        "tags" => array("tag1", "tag2", "tag3", "tag1", "tag2", "tag3", "tag3", "tag1", "tag2", "tag3"),
                    ),
                    array(
                        "img" => "images/img/news/news2.jpg",
                        "title" => "Заместитель премьер-министра Республики Татарстан и глава корпорации «ПРОМТЕХ» обсудили вопросы сотрудничества на МАКС-21",
                        "data" => "28.07.2021",
                        "text" => "<p>Встреча состоялась на площадке международного авиационно — космического салона МАКС-2021, который проходит 20-25 июля в подмосковном Жуковском. Стороны обсудили вопросы двустороннего сотрудничества в авиационной промышленности.</p><p>АО «ОКБ «Аэрокосмические системы», входящие в состав Корпорации «Промышленные технологии» (ПРОМТЕХ), является ведущим разработчиком систем и агрегатов авиационной отрасли, двигателестроения и космической техники.</p>",
                        "tags" => array("tag1", "tag2", "tag3"),
                    ),
                    array(
                        "img" => "images/img/news/news3.jpg",
                        "title" => "Интеллект для самолета",
                        "data" => "28.07.2021",
                        "text" => "<p>МАКС-2021. День второй. Дмитрий Шевелёв, генеральный конструктор опытно-конструкторского бюро «Аэрокосмические системы» в Программе Отражение на канале ОТР о том, какими новинками и достижениями наша страна уже может похвастаться и за какими технологиями будущее.</p>",
                        "tags" => array("tag1", "tag2", "tag3"),
                    ),
                );
                ?>

                <section class="news-section">
                    <div class="title-block filter-title">
                        <form action="" method="GET" class="news-search-form">
                            <div class="news-title">
                                <div class="plane-title">
                                    <h1>Новости</h1>
                                </div>
                                <div class="title-filter">
                                    <div id="showDetailFilter" class="btn orange-btn search-settings">
                                        <img src="https://server2.webisgroup.ru/promtech-career.ru/wp-content/themes/promtech-career/assets/settings.png" class="icon" alt="">
                                        <img src="https://server2.webisgroup.ru/promtech-career.ru/wp-content/themes/promtech-career/assets/settings_hover.png" class="icon__hover" alt="">
                                    </div>
                                    <div class="search-submit btn orange-btn">
                                        <img src="https://server2.webisgroup.ru/promtech-career.ru/wp-content/themes/promtech-career/assets/search.png" class="icon" alt="">
                                        <img src="https://server2.webisgroup.ru/promtech-career.ru/wp-content/themes/promtech-career/assets/search_hover.png" class="icon__hover" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="news-filter">
                                <div class="search-filters search-hidden-block">
                                    <div class="search-tags tags">
                                        <?for($i = 0; $i < count($tags); $i++) {?>
                                        <label for="#Tag<?=$i?>" class="tag label-tag"><?=$tags[$i]?>
                                            <input type="checkbox" name="tag<?=$i?>" class="hidden-checkbox" id="Tag<?=$i?>">
                                        </label>
                                        <?}?>
                                    </div>
                                </div>
                                <div class="search-sorts">
                                    <p>Сортировать:</p>
                                    <div class="sort-element">
                                        <label for="sortDate" class="sort-<?= $sort->sortByDate_value; ?>">
                                            <a href="<?= $sort->sortByDate; ?>">
                                            По дате
                                            </a>
                                        </label>
                                    </div>
                                    <div class="sort-element">
                                        <label for="sortAlfavit" class="sort-<?= $sort->sortByAlphabet_value; ?>">
                                            <a href="<?= $sort->sortByAlphabet; ?>">
                                            По алфавиту А-Я
                                            </a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="news-list">
                        <?php $main->init('News', 'news', ['offset' => 0,  'count' => 1])->view('list_news'); ?>
                        <div class="show-all-news">
                            <div class="text-center">
                                <a href="#" id="show_more_news">Показать еще новости</a>
                            </div>
                        </div>
                    </div>
                </section>
			</div>
			<div class="col-12 col-lg-5">
            <?
                $photo = array(
                    array(
                        "img" => "images/img/news/photo1.jpg",
                        "text" => "<p>Корпорация «Промышленные технологии» («Промтех»), которой в 2020 году исполнилось 25 лет, специализируется на разработке и производстве компонентов и систем для авиационной и ракетно-космической отрасли.</p>",
                        "tags" => array("Работа", "Достижения", "Сотрудники"),
                    ),
                    array(
                        "img" => "images/img/news/news1.jpg",
                        "text" => "<p>Корпорация «Промышленные технологии» («Промтех»), которой в 2020 году исполнилось 25 лет, специализируется на разработке и производстве компонентов и систем для авиационной и ракетно-космической отрасли. В состав корпорации входят ОКБ «Аэрокосмические системы», производственные площадки в Иркутске, Дубне, Казани, Ульяновске, Воронеже и Комсомольске-на-Амуре, сервисные предприятия, осуществляющие техническое обслуживание и ремонт авиационной техники, логистические подразделения, обеспечивающие материальнотехническое сопровождение кооперации.</p>",
                        "tags" => array("Работа", "Достижения", "Сотрудники"),
                    ),
                    array(
                        "img" => "images/img/news/news3.jpg",
                        "text" => "<p>МАКС-2021. День второй. Дмитрий Шевелёв, генеральный конструктор опытно-конструкторского бюро «Аэрокосмические системы» в Программе Отражение на канале ОТР о том, какими новинками и достижениями наша страна уже может похвастаться и за какими технологиями будущее.</p>",
                        "tags" => array("Работа", "Достижения", "Сотрудники"),
                    ),
                );
                ?>

                <section class="news-photo">
                    <div class="title-block filter-title">
                        <div class="news-title">
                            <div class="plane-title">
                                <h2>Фото</h2>
                            </div>
                            <div class="title-arrows">
                                <div class="title-arrow__prev">
                                    <a href="javascript:slickPrev('#newsPhoto')">
                                        <span class="icon-left"></span>
                                    </a>
                                </div>
                                <div class="title-arrow__next">
                                    <a href="javascript:slickNext('#newsPhoto')">
                                        <span class="icon-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="news-filter">
                            <div class="search-sorts">
                                <p>Сортировать:</p>
                                <div class="sort-element">
                                    <label for="sortDate" class="sort-<?= $sort->sortPhotoByDate_value; ?>">
                                        <a href="<?= $sort->sortPhotoByDate; ?>">
                                        По дате
                                        </a>
                                    </label>
                                </div>
                                <div class="sort-element">
                                        <label for="sortAlfavit" class="sort-<?= $sort->sortPhotoByAlphabet_value; ?>">
                                            <a href="<?= $sort->sortPhotoByAlphabet; ?>">
                                            По алфавиту А-Я
                                            </a>
                                        </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="photo-list">
                        <div id="newsPhoto">
                            <?php foreach($p as $photo) : ?>
                            <div class="news-photo__item photo-item">
                                <div class="photo-item__picture">
                                    <img src="<?=$photo->img;?>" alt="" class="photo-picture__img">
                                </div>
                                <div class="photo-item__content">
                                    <div class="photo-item__description">
                                        <?=$photo->post_title;?>
                                    </div>
                                    <div class="photo-item__tags tags">
                                        <?php foreach($photo->category_for_photo as $cat) : ?>
                                        <label for="#Tag0" class="tag label-tag"><?=$cat->name;?>                                            
                                            <input type="checkbox" name="tag0" class="hidden-checkbox" id="Tag0">
                                        </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
                <section class="news-video">
                    <div class="title-block filter-title">
                        <div class="news-title">
                            <div class="plane-title">
                                <h2>Видео</h2>
                            </div>
                            <div class="title-arrows">
                                <div class="title-arrow__prev">
                                    <a href="javascript:slickPrev('#newsVideo')">
                                        <span class="icon-left"></span>
                                    </a>
                                </div>
                                <div class="title-arrow__next">
                                    <a href="javascript:slickNext('#newsVideo')">
                                        <span class="icon-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video-list">
                        <div id="newsVideo">
                            <?php foreach($v as $video) : ?>
                            <div class="news-video__item video-item">
                                <div class="video-item__iframe">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$video->video_url?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="photo-item__description">
                                    <?=$video->post_title?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
			</div>
		</div>
	</div>
</section>