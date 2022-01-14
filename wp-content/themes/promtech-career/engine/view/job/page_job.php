<?php $main = new Main(); ?>
<section class="inner-vacancies">
	<div class="container">
		<div class="careers-list">
            <div class="row">
                <?php foreach($args['items'] as $key => $job) : ?>
                <?php $main->init('Job', 'job', 3)->view('list_job'); ?>
                <? endforeach; ?>
                <div class="col-12 show-all-careers">
                    <div class="text-center">
                        <a href="#">Показать ещё вакансии</a>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
