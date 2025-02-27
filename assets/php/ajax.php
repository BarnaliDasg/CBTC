<?php
require_once 'configu.php'; // Ensure this file sets up the database connection
require_once 'functions.php'; 

// Create a global database connection
$db = getDbConnection();
//follow user
if(isset($_GET['follow'])){
    $u_id = $_POST['u_id'];

    //followUser($u_id)
    if(followUser($u_id)){
        $response['status']=true;

    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}

//unfollow user
if(isset($_GET['unfollow'])){
    $u_id = $_POST['u_id'];

    //followUser($u_id)
    if(unfollowUser($u_id)){
        $response['status']=true;

    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}

//like
if(isset($_GET['like'])){
    $post_id = $_POST['post_id'];

    if(!checklikeStatus($post_id)){
        if(like($post_id)){
            $response['status'] = true;
        }
    }
    echo json_encode($response);
}

//unlike
if(isset($_GET['unlike'])){
    $post_id = $_POST['post_id'];

    if(checklikeStatus($post_id)){
        if(unlike($post_id)){
            $response['status'] = true;
        }
    }
    echo json_encode($response);
}

?>