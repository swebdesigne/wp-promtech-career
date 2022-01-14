<?

class AdminForm7 {
    public function __construct()
    {
        $this->init();
        $this->settings();
    }
    
    private function init() {
        // Custom contact form 7 retreat select
        add_action( 'wpcf7_init', 'custom_retreat_select' );

        function custom_retreat_select() {
            wpcf7_add_form_tag( 'retreat_select', 'custom_retreat_handler', array( 'name-attr' => true ) );
        }

        function custom_retreat_handler( $tag ) {
            $atts = array();
            $atts['name'] = $tag->name;
            $atts['class'] = $tag->get_class_option();
            $atts['id'] = $tag->get_id_option();
            $atts = wpcf7_format_atts( $atts );
            $html = '<select ' . $atts . '>';
            $args = array(
            'post_type' => 'city',
            'posts_per_page' => -1,
            );
            $retreats = get_posts( $args );
            foreach ( $retreats as $retreat ):
                $retreat_id = $retreat->ID;
                $slug = $retreat->post_name;
                $title = get_the_title($retreat_id);
                $html .= '<option value="' . $slug . '">' . $title . '</option>';
            endforeach;
            $html .= '</select>';
            return $html;
        }
    }
    
    private function settings() {
        add_filter('wpcf7_form_elements', function($content) {
            // $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
             $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-list-item(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
             // $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-list-item-label(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
             // $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control wpcf7-acceptance optional(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
             $content = str_replace('<br />', '', $content);
         
             $content = strip_tags($content, '<div><input><select><option><h4><label><textarea><span>');
         
             // echo("//!!");
             // die($content);
             $content = preg_replace('|<p[^>]*?>(.*?)</p>|', '\1', $content);
                 
             return $content;
         });
    }
}