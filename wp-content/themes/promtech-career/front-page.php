<?php 
get_header();
$data = new DataForFrontPage();

// bloginfo("name");
// bloginfo("description");

/* ======== СЛАЙДЕР ======== */
$data->slider()->template('home_slider', '', 1);

/* ======== ПОИСК ======== */
$data->search()->template('searchform', '', '');

/* ======== ВАКАНСИИ ======== */
$data->job()->template('job', 'all_job', '');




get_footer();


function mdd($arr) {
    echo "start =============== start";
    echo "<pre>";
    print_r($arr);
    die('end =============== end');
}
function md($arr) {
    echo "start =============== start";
    echo "<pre>";
    print_r($arr);
    echo 'end =============== end';
}