<section class="index-career">
    <div class="container">
        <ul class="careers-filter nav nav-tabs" id="careersTab" role="tablist">
            <?php foreach($args['category'] as $key => $cat) : ?>
            <? extract($_GET);
                if(isset($direction) && !empty($direction) && $cat->name != $direction) continue;
            ?>
            <li class="nav-item" role="presentation">
                <a 
                    id="careers<?= $key+1; ?>-tab" 
                    data-bs-toggle="tab" 
                    href="#careers<?= $key+1; ?>"
                    role="tab"
                    aria-controls="careers<?= $key+1; ?>" 
                    aria-selected="<? if ($key == 0){?>true<?}?>" 
                    class="nav-link careers-filter-item <? if ($key == 0 || $cat->name == $direction){?>active<?}?>">
                    <?= $cat->name; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="careers-list">
            <div class="careers-tabs tab-content" class="tab-content" id="careersTabsContent">
                <?php for ($i = 0; $i < count($args['category']); $i++) {?>
                    <? if(isset($direction) && !empty($direction) && $args['category'][$i]->name != $direction) continue;?>
                <div class="tab-pane fade<? if ($i == 0 || $args['category'][$i]->name == $direction){?> show active <?}?>" id='careers<?=($i+1)?>' role='tabpanel' aria-labelledby='careers<?=($i+1)?>-tab'>
                    <div class="row">
                        <?php foreach($args['items'] as $key => $job) : ?>
                            <?php if($args['category'][$i]->name == $job->item['name_category']) : ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="careers-element-container">
                                    <div class="career-element">
                                        <div class="career-element-content">
                                            <div class="career-element-top">
                                                <div class="career-big-img">
                                                    <a href="<?= $job->item['url']; ?>">
                                                        <img src="<?= (!empty($job->item['news_img_url'])) ? $job->item['news_img_url'] : get_template_directory_uri() . '/assets/img/stub440x290.jpg'; ?>" alt="<?= $job->post_title; ?>" class="career-title-img">
                                                    </a>
                                                </div>
                                                <div class="career-company">
                                                    <a href="<?= $job->item['company_url']; ?>">
                                                        <img src="<?= $job->item['logo_company_ulr']; ?>" alt="<?= $job->item['name_company']; ?>" class="career-company-img">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="career-element-middle">
                                                <div class="career-middle-title">
                                                    <a href="<?= $job->item['url']; ?>"><?= $job->post_title; ?></a>
                                                </div>
                                                <div class="career-middle-salary">
                                                    <p>
                                                        <?php if(!empty($job->item['salary_from'])) echo "???? " . $job->item['salary_from']; ?> 
                                                        <?php if(!empty($job->item['salary_to'])) echo " ???? " . $job->item['salary_to']; ?> 
                                                        <?php if(!empty($job->item['salary_from']) || !empty($job->item['salary_to'])) echo "  ??????. ???? ????????"; ?> 
                                                    </p>
                                                </div>
                                                <div class="career-middle-divider"></div>
                                                <div class="career-middle-about">
                                                    <p>?????????????????? ???????? ????????????: <?= $job->item['experience']; ?>. <?= $job->item['work_schedule']; ?></p>
                                                </div>
                                                <div class="career-middle-map">
                                                    <span class="icon-map"></span>
                                                    <p><?= $job->item['company_address']; ?></p>
                                                </div>
                                            </div>
                                            <div class="flex-1"></div>
                                            <div class="career-element-bottom">
                                                <div class="d-flex career-bottom">
                                                    <button class="btn orange-btn" data-bs-toggle="modal" data-bs-target="#modal__form">????????????????????????</button>
                                                    <a href="<?= $job->item['url']; ?>" class="link see-more">??????????????????</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <? endif; ?>
                        <? endforeach; ?>
                        <div class="col-12 show-all-careers">
                            <div class="text-center">
                                <a href="<?= home_url( '/' ); ?>vacansii/?direction=<?= (isset($_GET['direction']) && !empty($_GET['direction'])) ? $_GET['direction'] : $args['category'][0]->name?>">???????????????? ?????? ????????????????</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?}?>
            </div>
        </div>
    </div>
</section>
