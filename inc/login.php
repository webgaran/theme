<?php

if ( !is_user_logged_in() ):

if ( isset($_POST['login_submit']) ) :

$user_name = sanitize_text_field($_POST['username']);
$password = sanitize_text_field($_POST['password']);
$rememberme = isset($_POST['rememberme']);

if( empty($user_name) || empty($password) ){
    echo "<script type='text/javascript'>alert('لطفا تمامی فیلد ها رو تکمیل نمایید');</script>";
    exit;
}

$login_array = array();
$login_array['user_login'] = $user_name;
$login_array['user_password'] = $password;
$login_array['remember'] = $rememberme;

$verify_user = wp_signon( $login_array, false );

if ( !is_wp_error($verify_user) ) {
    wp_redirect( './panel' );
    exit;
} else {
    echo "<script type='text/javascript'>alert('نام کاربری یا رمز عبور اشتباه است');</script>";
}
endif;
?>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">ورود به سایت</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                    <div id="sl-login-wrapper">

                        <div class="login-message error" style="display: none;"></div>
                        <form action="<?php echo get_permalink(); ?>" name="sl_login_frm" id="sl_login_frm" method="POST">
                            <div class="form-group">
                                <label class="small" for="username">نام کاربری</label>
                                <input dir="ltr" class="form-control" type="text" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label class="small" for="password">کلمه عبور</label>
                                <input dir="ltr" class="form-control" type="password" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="rememberme" id="rememberme">
                                <small for="rememberme">مرا به خاطر بسپار</small>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-sm btn-info" name="login_submit" id="frm-login-submit" type="submit" value="ورود">
                            </div>
<!--                            --><?php //wp_nonce_field('ajax-calls','_nonce'); ?>
                        </form>
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a href="<?= home_url('/register') ?>">عضویت</a>
            </div>

        </div>
    </div>
</div>

<?php endif; ?>