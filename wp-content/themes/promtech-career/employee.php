<?php
/*
Template Name: Сотрудникам и партнерам
*/
$main = new Main();
$employee = $main->init('Employee', '', '');

get_header(); ?>
<section class="corporation-top">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title-block">
                    <div class="plane-title">
                        <h1>cотрудникам и партнерам</h1>
                    </div>
                </div>
                <div class="corporation-top__text">
                    <p><?= $employee->getInfo('info')->post_content; ?></p>
                </div>
            </div>
            <div class="col-12 offset-lg-1 col-lg-5">
                <div class="corporation-top__img">
                    <img src="<?= $employee->getInfo('info')->large; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<? $employee->view('list_category'); ?>
<? get_footer(); ?>