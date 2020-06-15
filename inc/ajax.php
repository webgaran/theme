<?php
add_action('wp_ajax_load_more_content','sl_load_more_content');
add_action('wp_ajax_nopriv_load_more_content','sl_load_more_content');

//sl users login
add_action('wp_ajax_nopriv_sl_user_login','sl_user_login');

function sl_load_more_content(){
    $page  = intval($_POST['page']);
    if($page){
        $posts_per_page  = 4;
        $offset = ($page - 1) * $posts_per_page;
        $load_more_args = array(
            'post_type' =>'post',
            'offset'  => $offset,
            'posts_per_page' => $posts_per_page
        );
        $load_more_query = new WP_Query($load_more_args);
        $output_html = '<div class="row">';
        if($load_more_query->have_posts()):
            while($load_more_query->have_posts()):$load_more_query->the_post();
                $output_html.='<div class="post-thumb col-md-3"><div class="box"><header><h3><a href="'.get_the_permalink().'">';
                $output_html.=get_the_title($load_more_query->post->ID) .'</a></h3></header>';
                $output_html.='<article><div class="project">';
                $output_html .= get_the_post_thumbnail($load_more_query->post->ID,'posts',array('class'=>'project__card'));
                $output_html.='</div></article>';
                $output_html.='<div class="footerbox"><ul><li>';
                $output_html.='</li></ul></div>';
                $output_html.='</div></div>';
            endwhile;
        endif;
        $count = count($load_more_query);
        wp_reset_postdata();
        $result = array();
        $result['count'] = $count;
        $result['content'] = $output_html.'</div>';
        wp_die(json_encode($result));
    }
    wp_die(json_encode(array('count'=>0,'error'=>1)));
}







