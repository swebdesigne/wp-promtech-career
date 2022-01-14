<?php 
header('Content-Type: text/html; charset=utf-8');
$main = new Main();
$job = $main->init('Job', 'job', 18);
$sort = $job->getJob('job')['sort'];
extract($_GET);
/*
Template Name: Вакансии
*/
get_header();
// Tools::mdd($sort);
?>
<div class="title-block vacancies-title">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-5">
				<div class="plane-title">
					<h1>Вакансии</h1>
					<p class="title-slogan">Стань частью команды <span class="orange">Промтех</span></p>
				</div>
			</div>
			<div class="col-12 col-lg-7">
            <section class="vacancies-search">
                <form action="" method="GET" class="vacancies-form-search">
                    <div class="search-visible-block">
                        <div class="d-flex align-items-center justify-content-between">
                            <input type="text" name="title" class="form-style w-100" placeholder=" <?php if(isset($title) && !empty($title)) echo $title; else echo 'Какую вакансию ищем?'; ?>">
                            <div id="showDetailFilter" class="btn orange-btn search-settings">
                                <img src="<?= get_template_directory_uri() ?>/assets/settings.png" class="icon" alt="">
                                <img src="<?= get_template_directory_uri() ?>/assets/settings_hover.png" class="icon__hover" alt="">
                            </div>
                            <div class="search-submit btn orange-btn">
                                <img src="<?= get_template_directory_uri() ?>/assets/search.png" class="icon" alt="">
                                <img src="<?= get_template_directory_uri() ?>/assets/search_hover.png" class="icon__hover" alt="">
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_GET['title']) || isset($_GET['city']) || isset($_GET['company']) || isset($_GET['direction'])) : ?>
                        <div class="search-sorts"><div class="sort-element"> <a href="<?= home_url( '/' )  ?>vacansii">Сбросить фильтр</a></div></div> 
                    <?php endif; ?>
                    <div class="search-hidden-block">
                        <div class="search-element">
                            <label for="#SalaryFrom">
                                Зарплата от:
                            </label>
                            <input type="text" id="SalaryFrom" name="salary_to" class="form-style" value="<?php if(isset($salary_to)) echo $salary_to; ?>">
                        </div>
                        <div class="search-element">
                            <label for="#citySearch">
                                Город:
                            </label>
                            <div class="form-item">
                                <select name="city" id="citySearch" class="custom-select">
                                    <option value="<?php if(isset($city) && !empty($city)) echo $city; ?>" disabled selected>
                                        <?php if(isset($city) && !empty($city)) echo $city; else echo 'Не выбран'; ?>
                                    </option>
                                    <?php foreach($main->init("City", "", "")->__list() as $city) : ?>
                                        <option value="<?= $city->post_title; ?>"><?= $city->post_title; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="search-element">
                            <label for="#companySelect">
                                Организация:
                            </label>
                            <div class="form-item">
                                <select name="company" id="companySelect" class="custom-select">
                                    <option value="<?php if(isset($company) && !empty($company)) echo $company; ?>" disabled selected>
                                        <?php if(isset($company) && !empty($company)) echo $company; else echo 'Не выбран'; ?>
                                    </option>
                                    <?php foreach($main->init("Company", "", "")->__list() as $company) : ?>
                                        <option value="<?= $company->post_title; ?>"><?= $company->post_title; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="search-element">
                            <label for="#directionSelect">
                                Направления:
                            </label>
                            <div class="form-item">
                                <select name="direction" id="directionSelect" class="custom-select">
                                    <option value="<?php if(isset($direction) && !empty($direction)) echo $direction; ?>" disabled selected>
                                    <?php if(isset($direction) && !empty($direction)) echo $direction; else echo 'Не выбран'; ?>
                                    </option>
                                    <?php foreach($main->init("Job", "job", -1)->getJob('job')['category'] as $direction) : ?>
                                        <option value="<?= $direction->name; ?>"><?= $direction->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="search-detail-block">
                        <div class="search-sorts">
                            <p>Сортировать:</p>
                            <div class="sort-element">
                                <label for="sortCompany" class="sort-<?= $sort->sortByCompany_value; ?>">
                                    <a href="<?= $sort->sortByCompany; ?>">
                                    По компаниям А-Я
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
                            <div class="sort-element">
                                <label for="sortRegion" class="sort-<?= $sort->sortByRegion_value; ?>">
                                    <a href="<?= $sort->sortByRegion; ?>">
                                    Территориально
                                    </a>
                                </label>
                            </div>
                            <div class="sort-element">
                                <label for="sortSalary" class="sort-<?= $sort->sortBySalary_value; ?>">
                                    <a href="<?= $sort->sortBySalary; ?>">
                                    По диапазону ЗП
                                    </a>
                                </label>
                            </div>
                        </div>
                    </div>
                    </form>
                </section>
			</div>
		</div>
	</div>
</div>
<section class="inner-vacancies">
	<div class="container">
		<div class="careers-list">
            <div class="row">
                <?php if(count($job->getJob('job')['items']) > 0) : ?>
                <? $job->view('list_job'); ?>
                <div class="col-12 show-all-careers">
                    <div class="text-center">
                        <a href="#"  id="show_more_job">Показать ещё вакансии</a>
                    </div>
                </div>
                <?php else: ?>
                <p style="text-align: center;">По заданным критериям вакансий не найдено.<br>Попробуйте изменить параметры поиска.</p>
                <?php endif; ?>
            </div>
        </div>
	</div>
</section>
<?
$main->init('Faq', 'faq', -1)->view('faq');
$main->init('Form', 'form', -1)->view('send_question');
get_footer();