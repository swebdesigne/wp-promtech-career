<?php 
$main = new Main();
$company = $main->init('Company', '', '');
$company->getAboutCompany(-1);
$company->get_list(-1);
$company->interview(-1);
/*
Template Name: О корпорации
*/
// Tools::mdd($company->getData('about'));
?>
<? get_header(); ?>
<section class="corporation-top">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title-block">
                    <div class="plane-title">
                        <h1>о корпорации</h1>
                    </div>
                </div>
                <div class="corporation-top__text">
                    <p><?= $company->getData('about')->post_content; ?></p>
                </div>
            </div>
            <div class="col-12 offset-lg-1 col-lg-5">
                <div class="corporation-top__img">
                    <img src="<?= $company->getData('about')->img_url; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<? $company->view('list_company'); ?>
<? $company->view('slider_interview'); ?>

<? get_footer(); ?>