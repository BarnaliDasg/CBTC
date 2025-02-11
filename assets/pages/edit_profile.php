<?php global $user; ?>
   
   <div class="container col-9 rounded-0 d-flex justify-content-between" >
        <div class="col-12 bg-white border rounded p-4 mt-4 shadow-sm">
            <form method="post" action="assets/php/actions.php?updateprofile" enctype="multipart/form-data" >
                <div class="d-flex justify-content-center">
                </div>
                <h1 class="h5 mb-3 fw-normal">Edit Profile</h1>
                <?php
                if(isset($_GET['success']))
                ?>
                <P class="text-success">Profile is updated</p>
                <?php

                ?>
                <div class="form-floating mt-1 col-6">
                    <img src="assets/images/profile/<?=$user['profile_pic']?>" class="img-thumbnail my-3" style="height:150px; width: 150px" alt="...">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Change Profile Picture</label>
                        <input class="form-control" name="profile_pic" type="file" id="formFile">
                        <?=showError('profile_pic')?>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-floating mt-1 col-6 ">
                        <input type="text" name="fname" value="<?=$user['fname']?>" class="form-control rounded-0" placeholder="username/email">
                        <label for="floatingInput">first name</label>
                    </div>
                    
                    <div class="form-floating mt-1 col-6">
                        <input type="text" name="lname" value="<?=$user['lname']?>" class="form-control rounded-0" placeholder="username/email">
                        <label for="floatingInput">last name</label>
                    </div>
                    
                </div>
                <?=showError('fname')?>
                <?=showError('lname')?>
                <div class="d-flex gap-3 my-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                            value="1" <?=$user['gender'] == 1 ? 'checked' : ''?> disabled>
                        <label class="form-check-label" for="exampleRadios1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3"
                            value="2" <?=$user['gender'] == 2 ? 'checked' : ''?> disabled>
                        <label class="form-check-label" for="exampleRadios3">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                            value="0" <?=$user['gender'] == 0 ? 'checked' : ''?> disabled>
                        <label class="form-check-label" for="exampleRadios2">
                            Other
                        </label>
                    </div>
                </div>

                <div class="form-floating mt-1">
                    <input type="email" name="email" value="<?=$user['email']?>" class="form-control rounded-0" placeholder="username/email"disabled>
                    <label for="floatingInput">email</label>
                </div>
                <div class="form-floating mt-1">
                    <input type="text" name="uname" value="<?=$user['uname']?>" class="form-control rounded-0" placeholder="username/email">
                    <label for="floatingInput">username</label>
                </div>
                <?=showError('uname')?>
                <div class="form-floating mt-1">
                    <input type="text" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">new password</label>
                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit" style="width: 100%; background-color: #e7c1fd; color: rgb(15, 43, 127);">Update Profile</button>



                </div>

            </form>
        </div>

    </div>