<?php 
get_header();
$data = new DataForFrontPage();

// bloginfo("name");
// bloginfo("description");

/* ======== ВЫВОД СЛАЙДЕРА ======== */

$data->slider()->template('home_slider', '', '');

/* ======== ВЫВОД ВАКАНСИЙ ======== */

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