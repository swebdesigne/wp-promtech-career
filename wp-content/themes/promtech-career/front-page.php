<? $data = new Main();
get_header();
/**
 * в init() первым параметром передаем имя класса
 * вторым указываем метод который должен отработать
 * в view() передается шаблон
*/
$data->init('Slider', 'home_slider', 1)->view('home_slider');
$data->init('Search', 'job_search')->view('searchform');
$data->init('Job', 'job', 6)->view('job');
$data->init('Digital', '', '')->view('home_digit');
$data->init('Video', '', -1)->view('home_static_video');
$data->init('Faq', 'faq', -1)->view('faq');
$data->init('Form', 'form', -1)->view('send_question');
get_footer();