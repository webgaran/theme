<?php
/* Template Name: Panel */
if ( !is_user_logged_in() ) {
    wp_redirect(home_url('register'));
}
get_header();

$active_tab = 'profile';
$whilelist = array('profile','new-post','settings','logout');
if(isset($_POST['save_profile'])){

    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $mobile = sanitize_text_field($_POST['mobile_number']);
    $user_id = get_current_user_id();

    $update_user = wp_update_user(array(
        'ID' => $user_id,
        'first_name' => $first_name,
        'last_name' => $last_name,
    ));



    if( !is_wp_error($update_user)){

        update_user_meta($user_id,'mobile',$mobile);
        $is_success = true;
        $message = 'پروفایل با موفقیت به روز رسانی گردید';

    }

}
if(isset($_GET['tab']) && !empty($_GET['tab']) && in_array($_GET['tab'],$whilelist)){

    $active_tab = esc_sql(strip_tags($_GET['tab']));

}
$tpl_path = get_template_directory().'/inc/panel/'.$active_tab.'.php';
?>
    <div class="mt-4" id="user-panel">
        <div class="container">
            <div class="row" id="user-panel-inner">
                <nav class="col-md-3  user-panel-nav">
                    <ul class="list-group">
                        <li><a class="list-group-item <?php echo ($active_tab == 'profile') ? 'active' : '' ?>" href="?tab=profile">پروفایل</a></li>
                        <li><a class="list-group-item <?php echo ($active_tab == 'new-post') ? 'active' : '' ?>" href="?tab=new-post">مطلب جدید</a></li>
                        <li><a class="list-group-item <?php echo ($active_tab == 'settings') ? 'active' : '' ?>" href="?tab=settings">تنظیمات</a></li>
                        <li><a class="list-group-item <?php echo ($active_tab == 'logout') ? 'active' : '' ?>" href="<?php echo wp_logout_url( home_url()); ?>">خروج</a></li>
                    </ul>
                </nav>
                <div class=" col-md-9" id="user-panel-content">
                    <div class="content p-3">
                        <?php
                        if( is_file($tpl_path) && file_exists($tpl_path)){
                            include $tpl_path;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();