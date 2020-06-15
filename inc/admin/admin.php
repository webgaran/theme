<?php
function sl_add_admin_assets(){
    wp_enqueue_style('sl-admin-css',get_template_directory_uri().'/inc/admin/assets/css/admin.css');
    wp_enqueue_script('sl-admin-js',get_template_directory_uri().'/inc/admin/assets/js/admin.js',array('jquery'));
}
add_action('admin_enqueue_scripts','sl_add_admin_assets');

function sl_add_admin_menus()
{

    //add_dashboard_page('My Plugin Dashboard', 'My Plugin', 'read', 'my-unique-identifier', 'my_plugin_function');
    $sl_theme_options_hook = add_menu_page('تنظیمات قالب', 'تنظیمات قالب', 'manage_options', 'sl-options-page', 'sl_options_page', 'dashicons-admin-generic');

    add_action("load-{$sl_theme_options_hook}", 'sl_theme_options_callback');
}

function sl_theme_options_callback()
{

    wp_enqueue_media();

}

//function my_plugin_function(){
//
//    ?>
<?php
//}
function sl_options_page()
{
    $slt_options = get_option('slt_options');

    //var_dump($slt_options);

    $whitelist = array('general', 'posts', 'users','settings','help');
    $default_tab = isset($_GET['tab']) && in_array($_GET['tab'], $whitelist) ? $_GET['tab'] : 'general';

    if (isset($_POST['submit'])) {

        switch ($default_tab) {

            case 'general' :

                $sl_theme_logo = sanitize_text_field($_POST['sl_theme_logo']);
                $slt_options['general']['sl_theme_logo'] = $sl_theme_logo;

                //Social Network Profiles Page

                if (!empty($_POST['sl_facebook_page'])) {
                    $slt_options['general']['sl_facebook_page'] = sanitize_text_field($_POST['sl_facebook_page']);
                } else {
                    unset($slt_options['general']['sl_facebook_page']);
                }
                $slt_options['general']['sl_twitter_page'] = sanitize_text_field($_POST['sl_twitter_page']);
                $slt_options['general']['sl_instagram_page'] = sanitize_text_field($_POST['sl_instagram_page']);
                $slt_options['general']['sl_gplus_page'] = sanitize_text_field($_POST['sl_gplus_page']);

                //Contact information
                $slt_options['general']['sl_theme_phone'] = sanitize_text_field($_POST['sl_theme_phone']);
                $slt_options['general']['sl_theme_address'] = sanitize_text_field($_POST['sl_theme_address']);
                $slt_options['general']['sl_theme_email'] = sanitize_text_field($_POST['sl_theme_email']);


                break;
            case 'settings':


                if(isset($_FILES['panel_setting']) && !empty($_FILES['panel_setting']['name'])){

                    $file = $_FILES['panel_setting']['tmp_name'];
                    $settings = file_get_contents($file);
                    $slt_options = json_decode($settings,true);
                    // dd($slt_options);
                    update_option('slt_options', $slt_options);

                }


                break;
            case 'help':
                break;

        }

        update_option('slt_options', $slt_options);


    }

    include get_template_directory() . '/inc/admin/view/index.php';

}

add_action('admin_menu', 'sl_add_admin_menus');


add_action('admin_post_sl_theme_panel_settings_output','sl_theme_panel_settings_output');
function sl_theme_panel_settings_output(){

    $settings_data = get_option('slt_options');
    $settings_data = json_encode($settings_data);
    header('Content-Description: File Transfer');
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="sl-settings.json"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . mb_strlen($settings_data));

    echo $settings_data;

}