<?php
//Template Name: Register
get_header();
include(get_template_directory() . '/inc/captcha/simple-php-captcha.php');
$has_error = false;
$has_success = false;

$message = array();
if (isset($_POST['register_submit'])) {
    $userName = sanitize_text_field($_POST['username']);
    $email = sanitize_text_field($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    $security = sanitize_text_field($_POST['security']);

    $login_array = array();
    $login_array['user_login'] = $userName;
    $login_array['user_password'] = $password;

    $password_confirmation = sanitize_text_field($_POST['password_confirmation']);
    if (empty($userName) || empty($email) || empty($password) || empty($password_confirmation) ) {
        $has_error = true;
        $message[] = "لطفا تمامی فیلد ها رو تکمیل نمایید";
    }
    if (username_exists($userName)) {
        $has_error = true;
        $message[] = "نام کاربری انتخاب شده در دسترس نمی باشد";
    }
    if (email_exists($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $has_error = true;
        $message[] = "ایمیل وارد شده در دسترس نمی باشد";
    }
    if ($password != $password_confirmation) {
        $has_error = true;
        $message[] = "کلمات عبور با هم دیگر تطبیق ندارند";
    }
    if (strtolower($_SESSION['captcha']['code']) <> strtolower($security)) {
        $has_error = true;
        $message[] = "کد امنیتی را به صورت صحیح وارد کنید";
    }
    if (!$has_error) {
        $newUserData = array(
            'user_login' => $userName,
            'user_email' => $email,
            'user_pass' => $password
        );
        $newUserID = wp_insert_user($newUserData);
        if (is_wp_error($newUserID)) {
            $has_error = true;
            $message[] = "در ثبت نام شما خطایی رخ داده است لطفا بعدا امتحان کنید";
        } else {
            $has_success = true;
            $message[] = "ثبت نام شما با موفقیت انجام شد.";
            wp_signon( $login_array, false );
            wp_redirect( './panel' );
            exit;
        }
    }
}
if(! is_user_logged_in()): ?>
<div class="wrapper">
    <div class="container" id="sl-register-wrapper">
        <div class="webgaran_breadcrumbs">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<i class="fa fa-lg fa-map-marker"></i> ' );
            }
            ?>
        </div>
        <div class="bg-white pt-3 pb-2 mb-2 shadow-sm rounded">
            <h1 class="text-center"><?php the_title() ?></h1>
        </div>
        <div class="content p-3">
        <?php if( $has_error ): ?>
            <div class="alert alert-danger">
                <?php foreach ($message as $item) :?>
                    <p><?php echo $item; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if( $has_success ): ?>
            <div class="register-message success">
               <?php foreach ($message as $item) :?>
                   <p><?php echo $item; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <form action="<?php echo get_permalink(); ?>" name="sl_register_frm" id="sl_register_frm" method="POST">
        <div class="row form-group">
            <div class="col-md-6">
                <label for="username">نام کاربری</label>
                <input dir="ltr" class="form-control" type="text" name="username" id="username" required>
            </div>
            <div class="col-md-6">
                <label for="email">آدرس ایمیل</label>
                <input dir="ltr" class="form-control" type="email" name="email" id="email" required>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6">
                <label for="password">کلمه عبور</label>
                <input dir="ltr" class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="col-md-6">
                <label for="password_confirmation">تکرار کلمه عبور</label>
                <input dir="ltr" class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-10">
                <label for="security">کد امنیتی</label>
                <input dir="ltr" class="form-control" type="text" name="security" id="security" required>
            </div>
            <?php $_SESSION['captcha'] = simple_php_captcha(); ?>
            <div class="col-md-2">
                <?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; ?>
            </div>
        </div>
        <div class="form-group">
            <input class="btn btn-sm btn-info" name="register_submit" id="frm-register-submit" type="submit" value="ثبت نام در وب سایت">
        </div>
    </form>
    </div>
</div>
</div>
<?php endif; get_footer(); ?>


