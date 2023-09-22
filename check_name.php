<?php
/**
 * file: check_name.php
 * @author anthoncode
 * @link https://anthoncode.com/en
 */
require_once 'config.php';
require_once 'functions.php';
try {
    if(isset($_POST['flag1'])){
        $like_id=$_POST['id'];
        $ip_address=$_SERVER['REMOTE_ADDR'];
        $count = checkUserAlreadyPost($like_id, $ip_address);
        if ($count==0) {
            echo likePost($like_id, $ip_address); 
        } else {
            echo dislikePost($like_id, $ip_address);  
        }
        exit;
    }

} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
