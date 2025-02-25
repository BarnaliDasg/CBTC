<?php 
global $profile;
global $profile_post;
global $user;
?>
<div class="container col-9 rounded-0">
    <div class="col-12 rounded p-4 mt-4 d-flex gap-5">
        <div class="col-4 d-flex justify-content-end align-items-start">
            <img src="assets/images/profile/<?=$profile['profile_pic']?>" 
                class="img-thumbnail rounded-circle my-3" style="height:170px; width:170px;" alt="Profile Picture">
        </div>
        <div class="col-8">
            <div class="d-flex flex-column">
                <div class="d-flex gap-3 align-items-center">
                    <span style="font-size: xx-large;"><?=$profile['fname']?> <?=$profile['lname']?></span>
                    <div style="width:20px"></div>
                    <?php if ($user['id'] != $profile['id']) { ?>
                    <!-- Dropdown for three dots -->
                    <div class="dropdown">
                        <span class="dropdown-toggle" style="cursor: pointer; font-size: xx-large;" 
                            type="button" id="dropdownMenuButton1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>  <!-- Three dots -->
                        </span>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item" href="#"><i class="fas fa-comment"></i> Message</a>
                            <a class="dropdown-item text-danger" href="#"><i class="fas fa-ban"></i> Block</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <span style="font-size: larger;" class="text-secondary">@<?=$profile['uname']?></span>
                <div class="d-flex gap-2 align-items-center my-3">
                    <a class="btn btn-sm btn-primary"><i class="fas fa-file-alt"></i> <?=count($profile_post)?> posts</a>
                    <div style="width:10px"></div>
                    <a class="btn btn-sm btn-primary"data-toggle='modal' data-target="#followerlist"><i class="fas fa-users"></i> <?=count($profile['followers'])?> followers</a>
                    <div style="width:10px"></div>
                    <a class="btn btn-sm btn-primary"data-toggle='modal' data-target="#followings"><i class="fas fa-user"></i> <?=count($profile['following'])?> following</a>
                </div>

                <?php if ($user['id'] != $profile['id']) { ?>
                <div class="d-flex gap-2 align-items-center my-1">
                    <?php if(checkFollowStatus($profile['id'])){ ?>
                        <button class="btn btn-sm btn-danger Unfollowbtn" data-user-id="<?=$profile['id']?>">Unfollow</button>
                    <?php }else{ ?>
                        <button class="btn btn-sm btn-primary followbtn" data-user-id="<?=$profile['id']?>">Follow</button>
                    <?php } ?>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <h3 class="border-bottom">Posts</h3>
    <?php
         if(count($profile_post)<1){
            echo "<p class='p-2 bg-white border rounded text-center'> User don't have any post <p>";
        }
    ?>
    <div class="gallery d-flex flex-wrap gap-2 mb-4">
        <?php
            foreach ($profile_post as $post) { ?>
            <img style="padding: 2px;" src="assets/images/posts/<?=$post['post_img']?>" data-toggle="modal" data-target="#postview<?=$post['id']?>" width="30%" class="rounded" />
            <!-- this is for showing post -->
            <!-- Modal -->
            <div class="modal fade" id="postview<?=$post['id']?>" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content border-0 rounded-lg">
                        <div class="modal-body p-0">
                            <div class="row no-gutters">
                                
                                <!-- Left Side: Post Image -->
                                <div class="col-md-6">
                                    <img src="assets/images/posts/<?=$post['post_img']?>" class="img-fluid rounded-left w-100" alt="Post Image">
                                </div>

                                <!-- Right Side: Comments Section -->
                                <div class="col-md-6 d-flex flex-column">
                                    
                                    <!-- User Info -->
                                    <div class="p-3 border-bottom d-flex align-items-center">
                                        <img src="assets/images/profile/<?=$profile['profile_pic']?>" class="rounded-circle mr-2" width="35" height="35" alt="User">
                                        <div>
                                            <span class="text-secondary" style="font-size: larger;"><?= $profile['fname'] ?> <?= $profile['lname'] ?></span><br>
                                            <span class="text-secondary">@<?= $profile['uname'] ?></span>
                                        </div>
                                    </div>

                                    <!-- Comments Section -->
                                    <div class="p-3 border-bottom">
                                        <h5 class="mb-0">Comments</h5>
                                    </div>

                                    <div class="comments-section flex-grow-1 p-3" style="overflow-y: auto; max-height: 400px;">
                                        <?php foreach ($comments as $comment): ?>
                                            <div class="d-flex align-items-start mb-3">
                                                <img src="assets/images/profile/<?= $comment['profile_pic'] ?>" class="rounded-circle mr-2" width="35" height="35" alt="<?= $comment['username'] ?>">
                                                <div class="comment-box bg-light p-2 rounded">
                                                    <strong><?= $comment['username'] ?></strong> <br>
                                                    <?= htmlspecialchars($comment['content']) ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <!-- Add Comment Box -->
                                    <div class="p-3 border-top">
                                        <div class="d-flex align-items-center">
                                            <input type="text" class="form-control rounded-pill" id="commentInput<?=$post['id']?>" placeholder="Add a comment...">
                                            <button class="btn btn-primary btn-sm ml-2 rounded-pill" id="<?=$post['id']?>">Post</button>
                                        </div>
                                    </div>

                                </div> <!-- End Right Side -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
            <?php } ?>


    </div>
</div>

<!-- Remove the dropdown arrow -->
<style>
    .dropdown-toggle::after {
        display: none !important;
    }
</style>

<!-- this is for follower list -->
<div class="modal fade" id="followerlist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Followers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!-- Fixed for Bootstrap 4 -->
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                foreach($profile['followers'] as $f){
                    $fuser = getUser($f['follower_id']);
                    $fbtn = "";
                    
                    if (checkFollowStatus($f['follower_id'])) {
                        $fbtn = '<button class="btn btn-sm btn-danger unfollowbtn" data-user-id="' . $fuser['id'] . '">Unfollow</button>';
                    } else if($user['id']==$f['follower_id']){
                        $fbtn = '';
                    }else {
                        $fbtn = '<button class="btn btn-sm btn-primary followbtn" data-user-id="' . $fuser['id'] . '">Follow</button>';
                    }                    
                ?>
                    <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center p-2">
                        <div><img src="assets/images/profile/<?=$fuser['profile_pic']?>" alt="" height="40" width="40" class="rounded-circle border">
                        </div>
                        <div>&nbsp;&nbsp;</div>
                        <a href="?u=<?=$fuser['uname']?>" class="text-decoration-none text-dark">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 style="margin: 0px;font-size: small;"><?=$fuser['fname']?> <?=$fuser['lname']?></h6>
                            <p style="margin:0px;font-size:small" class="text-muted">@<?=$fuser['uname']?></p>
                        </div>
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <?=$fbtn?>

                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
  </div>
</div>

<!-- this is for following list -->
<div class="modal fade" id="followings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Followings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!-- Fixed for Bootstrap 4 -->
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                foreach($profile['following'] as $f){
                    $fuser = getUser($f['u_id']);
                    $fbtn = "";
                    
                    if (checkFollowStatus($f['u_id'])) {
                        $fbtn = '<button class="btn btn-sm btn-danger unfollowbtn" data-user-id="' . $fuser['id'] . '">Unfollow</button>';
                    } else if($user['id']==$f['u_id']){
                        $fbtn = '';
                    }else {
                        $fbtn = '<button class="btn btn-sm btn-primary followbtn" data-user-id="' . $fuser['id'] . '">Follow</button>';
                    }                    
                ?>
                    <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center p-2">
                        <div><img src="assets/images/profile/<?=$fuser['profile_pic']?>" alt="" height="40" width="40" class="rounded-circle border">
                        </div>
                        <div>&nbsp;&nbsp;</div>
                        <a href="?u=<?=$fuser['uname']?>" class="text-decoration-none text-dark">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 style="margin: 0px;font-size: small;"><?=$fuser['fname']?> <?=$fuser['lname']?></h6>
                            <p style="margin:0px;font-size:small" class="text-muted">@<?=$fuser['uname']?></p>
                        </div>
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <?=$fbtn?>

                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
  </div>
</div>


