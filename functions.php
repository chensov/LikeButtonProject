<?php
/**
 * file: functions.php
 * @author anthoncode
 * @link https://anthoncode.com/en
 */

 function checkUserAlreadyPost($post_id, $ip_address)
{
    $sql = "SELECT id from post_likes where post_id=? and ip_address=?";
    $stmt = prepareStatement($sql, [$post_id, $ip_address]);
    $res = getResult($stmt);
    return $res->num_rows; //returns 1 or 0
}

//function: to update the number of likes in real time
function getPostLikeCount($post_id)
{
    $sql = "SELECT count(post_id) as count from post_likes where post_id=?"; 
    $stmt = prepareStatement($sql, [$post_id]);
    $res = getResult($stmt);
    $result =  $res->fetch_assoc();
    return $result['count'] ? $result['count'] : 0;
}

function likePost($post_id, $ip_address)
{
    global $mysqli;
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO post_likes (id, post_id, ip_address) VALUES (NULL,?,?)";
    prepareStatement($sql, [$post_id, $ip_address]);
    return getPostLikeCount($post_id); //to update the number of likes in real time
}

function dislikePost($post_id, $ip_address)
{
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $sql = "DELETE FROM post_likes where post_id = ? and ip_address = ?";
    prepareStatement($sql, [$post_id, $ip_address]);
    return getPostLikeCount($post_id);  //to update the number of likes in real time
}

//SQL query to show the number of likes each post has taking the IP address as id
function getPostLikes()
{
    $sql = "SELECT Posts.id,  
        Posts.description, 
        count(post_id) as likesCount FROM `posts` Posts 
        LEFT JOIN post_likes PostLikes 
        ON PostLikes.post_id = Posts.id
        GROUP BY Posts.id
        order by Posts.id ASC";
    $stmt = prepareStatement($sql);
    $res = getResult($stmt);
    return $res->fetch_all(MYSQLI_ASSOC);
}