<?php 
    global $user; 
    global $posts;
    global $follow_suggestions;
?>
    <div class="container col-9 rounded-0 d-flex justify-content-between">
        <div class="col-8">
            <?php

            showError('post_img');
            
                if(count($posts)<1){
                    echo "<p class='p-2 bg-white border rounded text-center my-3'>Follow someone or add a new post<p>";
                }
            foreach ($posts as $post){
            ?>
            <div class="card mt-4">
                <div class="card-title d-flex justify-content-between  align-items-center">

                    <div class="d-flex align-items-center p-2">
                        <img src="assets/images/profile/<?=$post['profile_pic']?>" alt="" height="30" width="30" class="rounded-circle border">&nbsp;&nbsp;<a href="?u=<?=$post['uname']?>" class="text-decoration-none text-dark"><?=$post['fname']?> <?=$post['lname']?></a>
                    </div>
                    <div class="p-2">
                        <i class="bi bi-three-dots-vertical"></i>
                    </div>
                </div>
                <img src="assets/images/posts/<?=$post['post_img']?>" class="" alt="...">
                <h4 style="font-size: x-larger" class="p-2 border-bottom">
                <?php
                    if(checklikeStatus($post['id'])){
                ?>
                    <i class="fa fa-heart unlike_btn" data-post-id="<?=$post['id']?>"></i>
                <?php
                    }else{
                ?>
                    <i class="far fa-heart like_btn" data-post-id="<?=$post['id']?>"></i>
                <?php
                    }
                ?>
                &nbsp;&nbsp;<i
                        class="bi bi-chat-left"></i>
                </h4>

                <?php 
                    if($post['post_txt']){
                ?>
                        <div class="card-body">
                        <?=$post['post_txt']?>

                        </div>
                <?php
                    }
                ?>
                

                <div class="input-group p-2<?=$post_txt?'border-top':''?>">
                    <input type="text" class="form-control rounded-0 border-0" placeholder="say something.."
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary rounded-0 border-0" type="button"
                        id="button-addon2">Post</button>
                </div>

            </div>
            <?php
            }
            ?>
            

        </div>

        <div class="col-4 mt-4 p-3">
            <div class="d-flex align-items-center p-2">
                <div><img src="assets/images/profile/<?=$user['profile_pic']?>" alt="" height="60" width="60" class="rounded-circle border">
                </div>
                <div>&nbsp;&nbsp;&nbsp;</div>
                <a href="?u=<?=$user['uname']?>" class="text-decoration-none text-dark">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h6 style="margin: 0px;"><?=$user['fname']?> <?=$user['lname']?></h6></>
                    <p style="margin:0px;" class="text-muted">@<?=$user['uname']?></p>
                </div>
                </a>
            </div>
        <div>
                <h6 class="text-muted p-2">You Can Follow Them</h6>
                <?php
                    foreach($follow_suggestions as $suser){
                ?>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center p-2">
                        <div><img src="assets/images/profile/<?=$suser['profile_pic']?>" alt="" height="40" width="40" class="rounded-circle border">
                        </div>
                        <div>&nbsp;&nbsp;</div>
                        <a href="?u=<?=$suser['uname']?>" class="text-decoration-none text-dark">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 style="margin: 0px;font-size: small;"><?=$suser['fname']?> <?=$suser['lname']?></h6>
                            <p style="margin:0px;font-size:small" class="text-muted">@<?=$suser['uname']?></p>
                        </div>
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-sm btn-primary followbtn" data-user-id="<?=$suser['id']?>">Follow</button>

                    </div>
                </div>
                <?php
                }
                if(count($follow_suggestions)<1){
                    echo "<p class='p-2 bg-white border rounded text-center'> No suggestions for you <p>";
                }
                ?>
                
            </div>
        </div>
    </div>