<? 
$data = new Main();
get_header();

/**
 * в init() первым параметром передаем имя класса
 * вторым указываем метод который должен отработать
 * в template() передается шаблон
*/
$data->init('Slider', 'home_slider', 1)->template('home_slider');
$data->init('Search', 'job_search')->template('searchform');
$data->init('Job', 'job', -1)->template('job');
$data->init('Job', 'job_category', -1)->template('job');

get_footer();
