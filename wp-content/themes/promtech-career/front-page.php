<? 
$data = new Main();
get_header();



/**
 * в init() первым параметром передаем имя класса
 * вторым массив аргументов
 * третьим массив аргументов
 * в template() передается шаблон
 */
$data->init('Slider', 'home_slider', 1)->template('home_slider');
$data->init('Search', 'job_search')->template('searchform');
$data->init('Job', 'all_job')->template('job');


// $data->job()->template('job', 'all_job', '');

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