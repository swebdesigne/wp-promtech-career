<?php


class ModalNews {
    protected function db_news() 
    {
        extract($_GET);
        $order = [];
        if (isset($sort_news_by_alphabet)) $order = ["order" => $sort_news_by_alphabet, "orderby" => "post_title"];
        if (isset($sort_news_by_date)) $order = ["order" => $sort_news_by_date, "orderby" => "post_date"];
        $news = get_posts( ['get_posts' => 1, 'parent' => 316, 'order' => $order['order'], 'orderby' => $order['orderby']] );
        $this->get_data_news($news);
        return $news;
    }

   protected function db_photo($param) 
   {
       extract($_GET);
       $order = [];
       if (isset($sort_photo_by_alphabet)) $order = ["order" => $sort_photo_by_alphabet, "orderby" => "post_title"];
       if (isset($sort_photo_by_date)) $order = ["order" => $sort_photo_by_date, "orderby" => "post_date"];
       $photo = get_posts( ['numberposts' => $param, 'post_type' => 'photo', 'order' => $order['order'], 'orderby' => $order['orderby']] );
       $this->get_data_news($photo);
       return  $photo;
   }
   
   protected function db_video($param) 
   {
       $video = get_posts( ['numberposts' => $param, 'post_type' => 'video'] );
       $this->get_data_news($video);
       return  $video;
   }
   protected function db_single_news($name) 
   {
       $interview[] = get_post();
       $this->get_data_news($interview);
       return $interview[0];
   }

   protected function get_data_news($data)
   {
      foreach($data as $k => &$post) {
          $post->news_url = get_page_link($post->ID);
          $post->img = get_the_post_thumbnail_url($post->ID);
          $newsParams = get_post_meta($post->ID);

          // добавляем все виды изображений
          $post->thumbnail = get_the_post_thumbnail_url($post->ID, "thumbnail");
          $post->medium = get_the_post_thumbnail_url($post->ID, "medium");
          $post->medium_large = get_the_post_thumbnail_url($post->ID, "medium_large");
          $post->large = get_the_post_thumbnail_url($post->ID, "large");
          $post->post_photo = get_the_post_thumbnail_url($post->ID, "post-photo");
          $post->post_news_big = get_the_post_thumbnail_url($post->ID, "post-news-big");
          $post->post_news_small = get_the_post_thumbnail_url($post->ID, "post-news-small");
          
          $date = explode(' ', $post->post_date);
          $post->date = str_replace("-", ".", $date[0]);
          $post->video_url = $newsParams['video'][0];

          // получаем катеогии (теги) для новости
          $post->category = get_the_category($post->ID);

          // получаем катеогии (теги) для фото
          $post->category_for_photo = get_the_terms($post->ID, 'photo_tag');
        //   Tools::md( $post );
          // получаем дополнительную информацию (телефон, адрес)
          $post->short_text = $newsParams['short_text'][0];
      }
  }

}