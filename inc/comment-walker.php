<?php
class Bootstrap_Comment_Walker extends Walker_Comment {
    /**
     * Output a comment in the HTML5 format.
     *
     * @since 1.0.0
     *
     * @see wp_list_comments()
     *
     * @param object $comment the comments list.
     * @param int    $depth   Depth of comments.
     * @param array  $args    An array of arguments.
     */
    protected function html5_comment( $comment, $depth, $args ) {
        $tag = ( $args['style'] === 'div' ) ? 'div' : 'li';
        ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'row has-children media' : ' row media' ); ?>>


    <div class="w-100 media-body card mt-3 " id="div-comment-<?php comment_ID(); ?>">
        <div class="col-12 card-header hoverable">
            <div class="flex-center">
                <?php if ( $args['avatar_size'] != 0  ): ?>
                    <a href="<?php echo get_comment_author_url(); ?>" class="media-object float-left">
                        <?php echo get_avatar( $comment, $args['avatar_size'],'mm','', array('class'=>"comment_avatar rounded-circle") ); ?>
                    </a>
                <?php endif; ?>
                <h4 class="media-heading "><?php echo get_comment_author_link() ?></h4>
            </div>
            <div class="comment-metadata flex-center">
                <a class="hidden-xs-down" href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
                    <time class=" small" datetime="<?php comment_time( 'c' ); ?>">
                        <?php comment_date() ?>,
                        <?php comment_time() ?>
                    </time>
                </a>
                <ul class="d-flex justify-content-between">
                    <?php edit_comment_link( __( 'Edit' ), '<li class="edit-link btn btn-info btn-sm chip text-white">', '</li>' ); ?>
                    <?php
                    comment_reply_link( array_merge( $args, array(
                        'add_below' => 'div-comment',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'before'    => '<li class=" reply-link list-inline-item btn btn-sm btn-info text-light chip">',
                        'after'     => '</li>'
                    ) ) );
                    ?>
                </ul>
            </div><!-- .comment-metadata -->
        </div>
        <div class="col-12 card-block warning-color">
        <?php if ( '0' == $comment->comment_approved ) : ?>
            <p class="card-text comment-awaiting-moderation label label-info text-muted small"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
        <?php endif; ?>

        <div class="comment-content card-text pt-3">
            <?php comment_text(); ?>
        </div><!-- .comment-content -->

        <!-- </div> -->

        <!-- </div>		 -->
        <?php
    }
}