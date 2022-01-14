<?
// header('Content-Type: text/html; charset=utf-8');
error_reporting(false);
class Job extends ModalJob {
    private $job;
    private $url;
    private $uri; 
    private $company;
    private $category;
    private $dir_template = 'engine/view/job/';

    public function __construct($initMethod, $param)
    {
        $this->url = get_page_link(get_post()->ID);
        $this->uri = (!empty($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '';
        if(!empty($initMethod)) $this->$initMethod($param);
    }

    public function getJob($name) 
    {
        // Tools::mdd($this->$name);
        return $this->$name;
    }
    
    public function setJob($name, $param) 
    {
        $this->$name($param);
    }


    private function job_category($param) 
    {
       return $this->category = $this->db_taxonomy_job($param);
    }

    private function get_data_job($arr) {
        foreach($this->job["items"] as $k => &$post) {
            $item = get_post_meta($post->ID);
            
            $attach_id = get_post_thumbnail_id($post->ID);
            $item['url'] = get_page_link($post->ID);
            $item['experience'] = $item['experience'][0];
            $item['internship'] = $item['internship'][0];
            $item['work_schedule'] = $item['work_schedule'][0];
            $item['name_category'] = wp_get_post_terms($post->ID, 'teg_job')[0]->name;
            $item['img_header'] = wp_get_attachment_image_url($item['img_header'][0], "full");
            
            // добавляем поля. Нужны для сортировки
            $post->name_company = (isset($item['company'])) ? get_the_title(unserialize($item['company'][0])[0]) : '';
            $post->city = (isset($item['city'])) ? get_the_title(unserialize($item['city'][0])[0]) : '';
            $post->direction = (isset($item['name_category'])) ?  $item['name_category'] : '';
            $post->salary_from = (isset($item['salary_from'])) ?  $item['salary_from'][0] : '';
            $post->salary_to = (isset($item['salary_to'])) ?  $item['salary_to'][0] : '';
            
            // стоимость 
            $item['salary_to'] = $post->salary_to;
            $item['salary_from'] = $post->salary_from;

            // все типы изображений
            $item['img'] = get_the_post_thumbnail($post->ID);
            $item['news_img_url'] = get_the_post_thumbnail_url($post->ID);
            $item['medium'] = wp_get_attachment_image_url($attach_id, 'medium');
            $item['post_photo'] = wp_get_attachment_image_url($attach_id, 'post-photo');
            $item['post_news_big'] = wp_get_attachment_image_url($attach_id, 'post-news-big');
            $item['post_news_small'] = wp_get_attachment_image_url($attach_id, 'post-news-small');

            // $post->thumbnail = get_the_post_thumbnail_url($post->ID, "thumbnail");
            // $post->medium = get_the_post_thumbnail_url($post->ID, "medium");
            // $post->medium_large = get_the_post_thumbnail_url($post->ID, "medium_large");
            // $post->large = get_the_post_thumbnail_url($post->ID, "large");
            // $post->post_photo = get_the_post_thumbnail_url($post->ID, "post-photo");
            // $post->post_news_big = get_the_post_thumbnail_url($post->ID, "post-news-big");
            // $post->post_news_small = get_the_post_thumbnail_url($post->ID, "post-news-small");
            
            // информация о компании
            $companyParams = get_post_meta(unserialize($item['company'][0])[0]);

            $item['company_mail'] = $companyParams['e-mail'][0];
            $item['company_address'] = $companyParams['adress'][0];
            $item['company_phones'] = explode("\r\n", $companyParams['phones'][0]);
            $item['company_url'] = get_page_link(unserialize($item['company'][0])[0]);
            $item['name_company'] = get_the_title(unserialize($item['company'][0])[0]);
            $item['logo_company_img'] = get_the_post_thumbnail(unserialize($item['company'][0])[0]);
            $item['logo_company_ulr'] = get_the_post_thumbnail_url(unserialize($item['company'][0])[0]);
            $item['conditions'] = array_filter(explode("\r\n", $item['conditions'][0]), function($element) { return !empty($element); });
            $item['requirements'] = array_filter(explode("\r\n", $item['requirements'][0]), function($element) { return !empty($element); });
            $item['responsibilities'] = array_filter(explode("\r\n", $item['responsibilities'][0]), function($element) { return !empty($element); });

            $post->item = $item;
            unset($item);
        }

        wp_reset_postdata();
    }

    private function job($param = -1) 
    {
        $this->job["items"] = $this->db_job($param);
        $this->get_data_job($this->job["items"]);
        $this->job['category'] = $this->job_category("all");

        $this->remainElementsWhichHaveIntoJobArray(false);
        $this->job["items"] = array_slice($this->job["items"], 0, $param);
        $this->sortByOrder();
    }

     private function remainElementsWhichHaveIntoJobArray($ajax = false) 
    {
        if ($ajax) {
            $parsed = explode('&', $_GET['search']);
            foreach($parsed as $name) {
                $tmp = explode("=", $name);
                $_GET[$tmp[0]] = urldecode($tmp[1]);
            }
        }
        extract($_GET);

        if (isset($city) && !empty($city)) $this->deleteElement($city, 'city');
        if (isset($title) && !empty($title)) $this->deleteElement($title, 'post_title');
        if (isset($company) && !empty($company)) $this->deleteElement($company, 'name_company');
        if (isset($direction) && !empty($direction)) $this->deleteElement($direction, 'direction');
        if (isset($salary_to) && !empty($salary_to)) $this->deleteElement($salary_to, 'salary_to');
    }

    private function deleteElement($strSearch, $field)
    {
        
        $strSearch =  mb_strtolower($strSearch, 'UTF-8');
        foreach ($this->job["items"] as $k => &$item) {
            if ($field == 'salary_to') { 
                if ($strSearch > $item->salary_to && !empty($item->salary_to)) unset($this->job["items"][$k]); 
            } else {
                $elem = mb_strtolower($item->$field, 'UTF-8');
                if (!preg_match("/$strSearch/", $elem) && !$this->search_by_fields($item, $strSearch)) unset($this->job["items"][$k]); 
            } 
        }
    }

    private function search_by_fields($item, $strSearch) {
        $items = [ 'responsibilities' => $item->item['responsibilities'], 'requirements' => $item->item['requirements'], 'conditions' => $item->item['conditions'] ];
        foreach ($items as $k => $elem) {
            foreach ($elem as $v) {
                if ($k == 'conditions') $conditions = mb_strtolower($v, 'UTF-8');
                if ($k == 'requirements')  $requirements = mb_strtolower($v, 'UTF-8');
                if ($k == 'responsibilities')  $responsibilities = mb_strtolower($v, 'UTF-8');
                if (preg_match("/$strSearch/", $responsibilities) || preg_match("/$strSearch/", $requirements) || preg_match("/$strSearch/", $conditions)) return true;
            }
        }
        return false;
    }

    private function sortByOrder() 
    {
        extract($_GET);

        $this->uri = preg_replace("/&sort_by_company=.*/", "", $this->uri);
        $this->uri = preg_replace("/?sort_by_company=.*/", "", $this->uri);
        $this->uri = preg_replace("/&sort_by_alphabet=.*/", "", $this->uri);
        $this->uri = preg_replace("/?sort_by_alphabet=.*/", "", $this->uri);
        $this->uri = preg_replace("/&sort_by_region.*/", "", $this->uri);
        $this->uri = preg_replace("/?sort_by_region.*/", "", $this->uri);
        $this->uri = preg_replace("/&sort_by_salary.*/", "", $this->uri);
        $this->uri = preg_replace("/?sort_by_salary.*/", "", $this->uri);
        
        // сортировка по компаниям А-Я
        $sortByCompanyASC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_by_company=asc" : "$this->url?sort_by_company=asc";
        $sortByCompanyDESC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_by_company=desc" : "$this->url?sort_by_company=desc";
        $this->job['sort']->sortByCompany = ($sort_by_company == 'desc') ? $sortByCompanyASC : $sortByCompanyDESC;
        $this->job['sort']->sortByCompany_value = $sort_by_company;
        usort($this->job["items"] , 'wpshout_sort_posts_by_company_'.$sort_by_company );
        
        // сортировка по алфавиту А-Я
        $sortByAlphabetASC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_by_alphabet=asc" : "$this->url?sort_by_alphabet=asc";
        $sortByAlphabetDESC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_by_alphabet=desc" : "$this->url?sort_by_alphabet=desc";
        $this->job['sort']->sortByAlphabet = ($sort_by_alphabet == 'desc') ? $sortByAlphabetASC : $sortByAlphabetDESC;
        $this->job['sort']->sortByAlphabet_value = $sort_by_alphabet;
        usort($this->job["items"] , 'wpshout_sort_posts_by_alphabet_'.$sort_by_alphabet );
        
        // сортировка Территориально
        $sortByRegionASC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_by_region=asc" : "$this->url?sort_by_region=asc";
        $sortByRegionDESC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_by_region=desc" : "$this->url?sort_by_region=desc";
        $this->job['sort']->sortByRegion = ($sort_by_region == 'desc') ? $sortByRegionASC : $sortByRegionDESC;
        $this->job['sort']->sortByRegion_value = $sort_by_region;
        usort($this->job["items"] , 'wpshout_sort_posts_by_region_'.$sort_by_region );
  
        // сортировка ЗП
        $sortBySalaryASC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_by_salary=asc" : "$this->url?sort_by_salary=asc";
        $sortBySalaryDESC = (!empty($this->uri)) ? $this->url. "$this->uri&sort_by_salary=desc" : "$this->url?sort_by_salary=desc";
        $this->job['sort']->sortBySalary = ($sort_by_salary == 'desc') ? $sortBySalaryASC : $sortBySalaryDESC;
        $this->job['sort']->sortBySalary_value = $sort_by_salary;
        usort($this->job["items"] , 'wpshout_sort_posts_by_salary_'.$sort_by_salary );

        // Tools::mdd($this->job);
    }


    private function ajax_job($param = -1) 
    {
        $this->job["items"] = $this->db_ajax_job($param);
        $this->get_data_job($this->job["items"]);
        
        $this->remainElementsWhichHaveIntoJobArray(true);
        $this->job["items"] = array_slice($this->job["items"], $param['offset'],  $param['count'] );
        $this->sortByOrder();
    }

    private function ajax_internship($param = -1) 
    {
        $this->job["items"] = $this->db_ajax_internship($param);
        $this->get_data_job($this->job["items"]);
        
        $this->remainElementsWhichHaveIntoJobArray(true);
        $this->job["items"] = array_slice($this->job["items"], $param['offset'],  $param['count'] );
        $this->sortByOrder();
    }

    private function single_job($param) 
    {
        $this->job["items"][] = $param;
        $this->get_data_job($this->job["items"]);
    }
    
    private function internship($param) 
    {
        $this->job["items"] = $this->db_internship($param);
        $this->get_data_job($this->job["items"]);
    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->job); }
}

function wpshout_sort_posts_by_company_desc( $a, $b ) {

    $a1 = mb_strtolower($a->name_company, 'UTF-8');
    $b1 = mb_strtolower($b->name_company, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $a1 ),
        wp_strip_all_tags( $b1 )
    );
}

function wpshout_sort_posts_by_company_asc( $a, $b ) {

    $a1 = mb_strtolower($a->name_company, 'UTF-8');
    $b1 = mb_strtolower($b->name_company, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $b1 ),
        wp_strip_all_tags( $a1 )
    );
}

function wpshout_sort_posts_by_region_desc( $a, $b ) {

    $a1 = mb_strtolower($a->city, 'UTF-8');
    $b1 = mb_strtolower($b->city, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $a1 ),
        wp_strip_all_tags( $b1 )
    );
}

function wpshout_sort_posts_by_region_asc( $a, $b ) {

    $a1 = mb_strtolower($a->city, 'UTF-8');
    $b1 = mb_strtolower($b->city, 'UTF-8'); 

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

function wpshout_sort_posts_by_salary_asc( $a, $b ) {
   
    $a1 = mb_strtolower($a->salary_from, 'UTF-8');
    $b1 = mb_strtolower($b->salary_from, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $a1 ),
        wp_strip_all_tags( $b1 )
    );
}

function wpshout_sort_posts_by_salary_desc( $a, $b ) {
   
    $a1 = mb_strtolower($a->salary_from, 'UTF-8');
    $b1 = mb_strtolower($b->salary_from, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $b1 ),
        wp_strip_all_tags( $a1 )
    );
}