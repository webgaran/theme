
<div class="contentside shadow">
    <h4 class="box-title"><i class="fas fa-thumbs-up"></i>  مطالب پربازدید</h4>

    <?php
    $args = array(
                        'post_type' => 'post',
                        'post__not_in' => get_option( 'sticky_posts' ) ,
                        'posts_per_page' => 7,
                        'meta_key' => 'post_view_count',
                        // 'meta_value' => '17',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC'
                    );
    $lastBlog = new WP_Query($args);

    if( $lastBlog->have_posts() ):

        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

        <div class="itemside">
          <div class="float-left">
              <div><a title="<?php the_title() ?>" href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('thumbnail') ?>" alt="<?php the_title() ?>"></a> </div>
          </div>
            <div>
                <div class="titleside"><a title="<?php the_title() ?>" href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
            </div>

          </div>


        <?php endwhile;

    endif;

    wp_reset_postdata();


    ?>
</div> <br>

<div class="contentside shadow">
    <ul class="list-group">
        <li class="box-title">دسته بندی ها</li>
        <?php $categories = get_categories();
        foreach($categories as $category) {
            echo '<li><a class="list-group-item list-group-item-action" title="' . $category->name . '" href="' . get_category_link($category->term_id) . '">' . $category->name . '<span class="badge badge-primary badge-pill pull-left mt-1">' . $category->category_count . '</span></a></li>';
        } ?>
    </ul>
</div>





<!-- <div class="instagramBox">
      <a target="_blank" title="<?php //bloginfo('title'); ?>" href="https://instagram.com/webgaran"> <img alt="<?php //bloginfo('title'); ?>" src="<?php //echo get_template_directory_uri() ?>/assets/img/instagram.svg">
      وبگران در اینستاگرام ...</a>
  </div> -->













    </div>
</div>
