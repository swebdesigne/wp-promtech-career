<?

class Job extends ModalJob {
    private $job;
    private $company;
    private $category;
    private $dir_template = 'engine/view/job/';

    public function __construct($initMethod, $param)
    {
        if(!empty($initMethod)) $this->$initMethod($param);
    }

    public function getJob($name) 
    {
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
            $attach_id = get_post_thumbnail_id(355);
            $item['url'] = get_page_link($post->ID);
            $item['experience'] = $item['experience'][0];
            $item['work_schedule'] = $item['work_schedule'][0];
            $item['name_category'] = wp_get_post_terms($post->ID, 'teg_job')[0]->name;
            
            // стоимотсь 
            $item['salary_to'] = $post->salary_to;
            $item['salary_from'] = $post->salary_from;

            // все типы изображений
            $item['img'] = get_the_post_thumbnail($post->ID);
            $item['news_img_url'] = get_the_post_thumbnail_url($post->ID);
            $item['medium'] = wp_get_attachment_image_url($attach_id, 'medium');
            $item['post_photo'] = wp_get_attachment_image_url($attach_id, 'post-photo');
            $item['post_news_big'] = wp_get_attachment_image_url($attach_id, 'post-news-big');
            $item['post_news_small'] = wp_get_attachment_image_url($attach_id, 'post-news-small');
            
            // информация о компании
            $companyParams = get_post_meta(unserialize($item['company'][0])[0]);

            $item['company_mail'] = $companyParams['e-mail'][0];
            $item['company_phones'] = $companyParams['phones'][0];
            $item['company_address'] = $companyParams['adress'][0];
            $item['company_url'] = get_page_link(unserialize($item['company'][0])[0]);
            $item['name_company'] = get_the_title(unserialize($item['company'][0])[0]);
            $item['logo_company_img'] = get_the_post_thumbnail(unserialize($item['company'][0])[0]);
            $item['logo_company_ulr'] = get_the_post_thumbnail_url(unserialize($item['company'][0])[0]);

            $post->item = $item;
        }
        wp_reset_postdata();
    }

    private function job($param = -1) 
    {
        $this->job["items"] = $this->db_job($param);
        $this->get_data_job($this->job["items"]);
        $this->job['category'] = $this->job_category("all");
    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->job); }
}