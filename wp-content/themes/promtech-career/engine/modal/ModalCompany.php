<?

class ModalCompany {
    protected function db_about_company() 
    {   
        $data = get_post();
        $data->img_url = get_the_post_thumbnail_url($data->ID);
        return $data;
    }

    protected function db_company($param) 
    {
        return get_posts( ['numberposts' => $param, 'post_type' => 'brands'] );
    }

    protected function get_data($data)
     {
        foreach($data as $k => &$post) {
            $post->company_url = get_page_link($post->ID);
            $post->logo_url = get_the_post_thumbnail_url($post->ID);
            
            // получаем дополнительную информацию (телефон, адрес)
            $companyParams = get_post_meta($post->ID);
            $post->address = $companyParams['adress'][0];
            $post->phones = array_filter(explode("\r\n", $companyParams['phones'][0]), function($element) { return !empty($element); });
            $post->email = array_filter(explode("\r\n", $companyParams['e-mail'][0]), function($element) { return !empty($element); });
            $post->site = $companyParams['site'][0];
            $post->short_text = $companyParams['short_text'][0];

            // доработать
            $post->slider = get_post_meta(unserialize($companyParams['slider'][0])[0])['_wp_attached_file'];
            // $post->video = get_page_by_title( 'промтех-Дубна', OBJECT, 'video' );
            
            // $companyParams = get_post_meta(346);
            // Tools::md($post);
        }
    }

    protected function db_single_video($name) 
    {
        $video = get_page_by_title( $name, OBJECT, 'video' );
        return $video;
    }

    protected function db_interview($param) 
    {
        $interview = get_posts( ['numberposts' => $param, 'post_type' => 'interview'] );
        $this->get_data_review($interview);
        return $interview;
    }

    protected function db_interview_of_company($name) 
    {
        $interview = $this->db_interview(-1);
        $this->get_data_review($interview);
        foreach($interview as $k => &$post) {
            if ($post->company != $name) unset($interview[$k]);
        }
        return array_slice($interview, 0, 3);
    }

    protected function db_single_interview($name) 
    {
        $interview[] = get_post();
        $this->get_data_review($interview);
        return $interview[0];
    }

    protected function get_data_review($data)
     {
        foreach($data as $k => &$post) {
            $post->review_url = get_page_link($post->ID);
            $post->logo_url = get_the_post_thumbnail_url($post->ID);
            $post->logo_url = get_the_post_thumbnail_url($post->ID);
          
           
            // добавляем все виды изображений
            $post->thumbnail = get_the_post_thumbnail_url($post->ID, "thumbnail");
            $post->medium = get_the_post_thumbnail_url($post->ID, "medium");
            $post->medium_large = get_the_post_thumbnail_url($post->ID, "medium_large");
            $post->large = get_the_post_thumbnail_url($post->ID, "large");
            $post->post_photo = get_the_post_thumbnail_url($post->ID, "post-photo");
            $post->post_news_big = get_the_post_thumbnail_url($post->ID, "post-news-big");
            $post->post_news_small = get_the_post_thumbnail_url($post->ID, "post-news-small");

            $interviewParams = get_post_meta($post->ID);
            // получаем дополнительную информацию (телефон, адрес)
            $post->employee = $interviewParams['sub_title'][0];
            $post->short_text = $interviewParams['short_text'][0];
            $post->company = get_post_field( 'post_title', unserialize($interviewParams['company'][0])[0]);
        }
    }
}