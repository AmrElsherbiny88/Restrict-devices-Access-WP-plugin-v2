<?php
/*
Plugin Name: Restrict iOS Access
Description: Restrict access to the website to only iOS devices.
Version: 1.7
Author: Your Name
*/





function restrict_ios_access() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($user_agent, 'iPhone') !== false || strpos($user_agent, 'iPad') !== false || strpos($user_agent, 'iPod') !== false  || strpos($user_agent, 'Windows NT') !== false ||  // Windows Phone
    strpos($user_agent, 'Macintosh') !== false ||  // Mac devices (laptops/desktops)
        strpos($user_agent, 'wv') !== false) {
        
        return ;
    } else {
        // Block access for non-iOS devices and show download image
        $download_image = '<a href="https://atqinarabic.com/wp-content/uploads/2024/09/com.atqin_.arabic.apk"><img src="https://www.svgrepo.com/show/303139/google-play-badge-logo.svg" alt="Download on Google Play" style="width:150px;"></a>';
        wp_die('
        <div style="text-align:center; height:100vh; background-color:#454545; color:white;">
            <h2>404</h2>
         <br>
        <h2>عذرا هذا الموقع لا يعمل علي اجهزة اندرويد برجاء تنزبل التطبيق من الضغط علي الزر</h2>
        </div>
    ' . $download_image);
    }
}
add_action('template_redirect', 'restrict_ios_access');

?>


