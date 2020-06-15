<?php
if (post_password_required())
    return;

?>




<div id="post-comments" class="card comments-area p-3">
    <?php if (have_comments()) : ?>
        <h3 class="comment-title"><?php echo get_comments_number(); ?> دیدگاه برای این مطلب ثبت شده است</h3>
        <div class="card-body comment-list">
            <div>
                <?php wp_list_comments(array(
                    'walker'      => new Bootstrap_Comment_Walker(),
//                    'callback' => 'Bootstrap_Comment_Walker',
                    'short_ping'    => true,
                    'max_depth'     => 2,
                    'avatar_size'   => '50',
                    'style' => 'ol'
                ));
                ?>
            </div><!-- .commentlist -->
        </div>
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through  ?>
            <div class="box comment-pagination">
                <?php paginate_comments_links(); ?>
            </div>
        <?php endif; // check for comment navigation  ?>
        <?php
        /* If there are no comments and comments are closed, let's leave a note.
         * But we only want the note on posts and pages that had comments in the first place.
         */
        if (!comments_open() && get_comments_number()) :
            ?>
            <p class="nocomments">No Comments</p>
        <?php endif; ?>
    <?php endif; // have_comments()  ?>
    <?php
    $commenter=  wp_get_current_commenter();
    $req=  get_option('require_name_email');
    $aria_req=($req?"aria-required='true'":'');
    $fields =  array(
        'author' => '<div class="form-group"><div class="col-md-6">' . '<label for="author">' . __( 'نام شما' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
            '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div></div>',
        'email'  => '<div class="form-group"><div class="col-md-6"><label for="email">' . __( 'ایمیل شما' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
            '<input dir="ltr" class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' /></div></div>',
//        'url'    => '<div  class="comment-frm-row"><label for="url">' . __( ' ' ) . '</label>' .
//            '<input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="وب سایت شما : " size="30" /></div><div class="clearfix"></div>',
    );
    $comments_args=array(
        'fields'=>$fields,
        'title_reply'=>'دیدگاه خود را بیان کنید : ',
        'label_submit'=>'ارسال دیدگاه',
        'class_submit'=>'btn btn-sm btn-info mt-2',
        'comment_field' => '<p class="col-md-6 float-left"><label for="comment">' . __( 'پیام شما' ) . '</label><br /><textarea rows="4" class="form-control" id="comment" name="comment" aria-required="true"></textarea></p>',
        //'comment_notes_before'=>'<p class="comment-notes">Some Texts</p>',
        // 'comment_notes_after'=>'<p class="comment-notes-after">Some Text</p>'
    );
    comment_form($comments_args); ?>
</div><!-- #comments .comments-area -->

