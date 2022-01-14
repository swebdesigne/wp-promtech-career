<?php

class ModalEmployee {
    protected function db_employee() 
    {
        $commonInfo = get_post();
        $this->get_data_common( $commonInfo );
        return $commonInfo;
    }

    protected function db_data_category()
    {
        $category = get_pages(['parent'       => 39]);
        $this->get_data_category( $category );
        return $category;
    }

    protected function db_data_single()
    {
        return get_post()->post_content;
    }

    private function get_data_category(&$data)
    {
        foreach ($data as $k => &$post) {
           
            $post->category_url = get_page_link($post->ID);
            $post->img_url = get_the_post_thumbnail_url($post->ID);
           
            // добавляем все виды изображений
            $post->thumbnail = get_the_post_thumbnail_url($post->ID, "thumbnail");
            $post->medium = get_the_post_thumbnail_url($post->ID, "medium");
            $post->medium_large = get_the_post_thumbnail_url($post->ID, "medium_large");
            $post->large = get_the_post_thumbnail_url($post->ID, "large");
            $post->post_photo = get_the_post_thumbnail_url($post->ID, "post-photo");
            $post->post_category_big = get_the_post_thumbnail_url($post->ID, "post-news-big");
            $post->post_category_small = get_the_post_thumbnail_url($post->ID, "post-news-small");
            
            $post->short_text = get_fields($post->ID, 'short_text')['short_text'];
        }
    }

    private function get_data_common(&$data)
    {
        foreach ($data as $k => &$post) {
            
            // добавляем все виды изображений
            $data->img = get_the_post_thumbnail($post);
            $data->thumbnail = get_the_post_thumbnail_url($post, "thumbnail");
            $data->medium = get_the_post_thumbnail_url($post, "medium");
            $data->medium_large = get_the_post_thumbnail_url($post, "medium_large");
            $data->large = get_the_post_thumbnail_url($post, "large");
            $data->post_photo = get_the_post_thumbnail_url($post, "post-photo");
            $data->post_news_big = get_the_post_thumbnail_url($post, "post-news-big");
            $data->post_news_small = get_the_post_thumbnail_url($post, "post-news-small");
           
        }
    }
}