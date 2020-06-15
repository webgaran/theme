<div id="user-profile">
    <form action="" method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="first_name" value="<?php echo get_user_meta(get_current_user_id(),'first_name',true); ?>" placeholder="نام">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="last_name" value="<?php echo get_user_meta(get_current_user_id(),'last_name',true); ?>" placeholder="نام خانوادگی">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="mobile_number" value="<?php echo get_user_meta(get_current_user_id(),'mobile',true); ?>" placeholder="شماره همراه">
        </div>
        <div class="form-group">
            <input class="btn btn-sm btn-success" value="ذخیره پروفایل کاربری" type="submit" name="save_profile">
        </div>
        <?php wp_nonce_field('user-profile-save'); ?>
    </form>
</div>