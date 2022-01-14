<?
error_reporting(false);
class News extends ModalNews {
    private $data;
    private $url;
    private $uri; 
    private $dir_template = 'engine/view/news/';

    public function __construct($initMethod, $param)
    {
        $this->url = get_page_link(get_post()->ID);
        $this->uri = (!empty($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '';
        if(!empty($initMethod)) $this->$initMethod($param);
    }

    public function set_news($name, $param)
    {
       $this->$name($param);
    }

    public function getData($name = '')
    {
        if (!empty($name)) return $this->data[$name];
        return $this->data;
    }

    private function news($param) 
    {
        $this->data['news'] = $this->db_news();
        $this->data['news'] = array_slice($this->data['news'],  $param['offset'], 3);
    }
   
    private function photo($param) 
    {
        $this->data['photo'] = $this->db_photo($param);
    }

    private function video($param) 
    {
        $this->data['video'] = $this->db_video($param);
    }

    public function single_news($param) 
    {
        $this->data['single_news'] = $this->db_single_news($param);
    }

    private function sort() 
    {
        extract($_GET);
        
        $this->uri = preg_replace("/&sort_news_by_alphabet=.*/", "", $this->uri);
        $this->uri = preg_replace("/?sort_news_by_alphabet=.*/", "", $this->uri);
        $this->uri = preg_replace("/&sort_news_by_date.*/", "", $this->uri);
        $this->uri = preg_replace("/?sort_news_by_date.*/", "", $this->uri);

   
        $this->uri = preg_replace("/&sort_photo_by_alphabet=.*/", "", $this->uri);
        $this->uri = preg_replace("/?sort_photo_by_alphabet=.*/", "", $this->uri);
        $this->uri = preg_replace("/&sort_photo_by_date.*/", "", $this->uri);
        $this->uri = preg_replace("/?sort_photo_by_date.*/", "", $this->uri);

        
        // сортировка по алфавиту А-Я
        $sortByAlphabetASC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_news_by_alphabet=asc" : "$this->url?sort_news_by_alphabet=asc";
        $sortByAlphabetDESC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_news_by_alphabet=desc" : "$this->url?sort_news_by_alphabet=desc";
        $this->data['sort']->sortByAlphabet = ($sort_news_by_alphabet == 'desc') ? $sortByAlphabetASC : $sortByAlphabetDESC;
        $this->data['sort']->sortByAlphabet_value = $sort_news_by_alphabet;
        
        // сортировка по дате
        $sortByDateASC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_news_by_date=asc" : "$this->url?sort_news_by_date=asc";
        $sortByDateDESC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_news_by_date=desc" : "$this->url?sort_news_by_date=desc";
        $this->data['sort']->sortByDate = ($sort_news_by_date == 'desc') ? $sortByDateASC : $sortByDateDESC;
        $this->data['sort']->sortByDate_value = $sort_news_by_date;
  
        // сортировка по алфавиту А-Я
        $sortPhotoByAlphabetASC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_photo_by_alphabet=asc" : "$this->url?sort_photo_by_alphabet=asc";
        $sortPhotoByAlphabetDESC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_photo_by_alphabet=desc" : "$this->url?sort_photo_by_alphabet=desc";
        $this->data['sort']->sortPhotoByAlphabet = ($sort_photo_by_alphabet == 'desc') ? $sortPhotoByAlphabetASC : $sortPhotoByAlphabetDESC;
        $this->data['sort']->sortPhotoByAlphabet_value = $sort_photo_by_alphabet;
        
        // сортировка по дате
        $sortPhotoByDateASC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_photo_by_date=asc" : "$this->url?sort_photo_by_date=asc";
        $sortPhotoByDateDESC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_photo_by_date=desc" : "$this->url?sort_photo_by_date=desc";
        $this->data['sort']->sortPhotoByDate = ($sort_photo_by_date == 'desc') ? $sortPhotoByDateASC : $sortPhotoByDateDESC;
        $this->data['sort']->sortPhotoByDate_value = $sort_photo_by_date;
    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->data); }
}



function wpshout_sort_posts_by_date_desc( $a, $b ) {

    $a1 = mb_strtolower($a->date, 'UTF-8');
    $b1 = mb_strtolower($b->date, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $a1 ),
        wp_strip_all_tags( $b1 )
    );
}

function wpshout_sort_posts_by_date_asc( $a, $b ) {

    $a1 = mb_strtolower($a->date, 'UTF-8');
    $b1 = mb_strtolower($b->date, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $b1 ),
        wp_strip_all_tags( $a1 )
    );
}

function wpshout_sort_posts_by_alphabet_desc( $a, $b ) {

    $a1 = mb_strtolower($a->post_title, 'UTF-8');
    $b1 = mb_strtolower($b->post_title, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $a1 ),
        wp_strip_all_tags( $b1 )
    );
}

function wpshout_sort_posts_by_alphabet_asc( $a, $b ) {

    $a1 = mb_strtolower($a->post_title, 'UTF-8');
    $b1 = mb_strtolower($b->post_title, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $b1 ),
        wp_strip_all_tags( $a1 )
    );
}

function wpshout_sort_photo_by_alphabet_desc( $a, $b ) {

    $a1 = mb_strtolower($a->post_title, 'UTF-8');
    $b1 = mb_strtolower($b->post_title, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $a1 ),
        wp_strip_all_tags( $b1 )
    );
}

function wpshout_sort_photo_by_alphabet_asc( $a, $b ) {

    $a1 = mb_strtolower($a->post_title, 'UTF-8');
    $b1 = mb_strtolower($b->post_title, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $b1 ),
        wp_strip_all_tags( $a1 )
    );
}

function wpshout_sort_photo_by_date__asc( $a, $b ) {
   
    $a1 = mb_strtolower($a->date, 'UTF-8');
    $b1 = mb_strtolower($b->date, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $a1 ),
        wp_strip_all_tags( $b1 )
    );
}

function wpshout_sort_photo_by_date__desc( $a, $b ) {
   
    $a1 = mb_strtolower($a->date, 'UTF-8');
    $b1 = mb_strtolower($b->date, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $b1 ),
        wp_strip_all_tags( $a1 )
    );
}