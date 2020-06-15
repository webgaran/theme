<section id="posts">
<ul class="row">
    <?php
    global $paged;
    $lastBlog = new WP_Query(array(
        'posts_per_page' => 8,
        // 'offset'         => 1,
        'post__not_in' => get_option("sticky_posts"),
    )); ?>
    <?php
    if( $lastBlog->have_posts() ):
        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
            <li class="col-md-12">
                <div class="box">
                    <header>
                        <h3><a title="<?php the_title() ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                    </header>
                    <article>
                        <div class="project"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                            <div class="float-left">
                                <img  src="<?php the_post_thumbnail_url('thumbnail') ?>" alt="<?php the_title(); ?>">
                            </div></a>
                        </div>
                        <?php echo wp_trim_words( get_the_content(),36, '...' );  ?>
                    </article>
                    <div class="footerbox">
                        <ul>
                            <li>
                                <span><i class="fas fa-eye"></i> <?php if ( function_exists( 'get_post_view_count' ) ) {echo get_post_view_count( get_the_ID() );}?></span>
                            </li>
                            <li>
                                <span><i class="fas fa-comments"></i> <?php comments_number( 'هیچ', ' یک  ', ' % ' );  ?> </span>
                            </li>
                            <li>
                                <span class="like"><?php echo likeCount($post->ID) ?> <i class="fas fa-heart"></i></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        <?php
        endwhile;
        wp_reset_postdata();
    endif;?>
</ul>
<div class="text-center ">
    <?php paginate_links() ?>
</div>
</section>