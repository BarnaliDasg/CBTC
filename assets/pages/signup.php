<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form method="post" action="assets/php/actions.php?signup" style="width: 70%; max-width: 600px; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); border-radius: 10px; padding: 20px;">
        <div style="text-align: center;">
            <img src="assets/images/cds.png" height="45" style="width: 40%; max-width: 150px;">  
            <h3>Create New Account</h3>
        </div>

    <div class="d-flex gap-2 mt-1">
        <div class="form-floating flex-fill">
            <input type="text" name="fname" class="form-control rounded-0" id="fname" placeholder="First Name" value="<?= showFormData('fname') ?>">
            <label for="fname" class="form-label">First Name</label>
            <?= showError('fname') ?>
        </div>

        <div class="form-floating flex-fill">
            <input type="text" name="lname" class="form-control rounded-0" id="lname" placeholder="Last Name" value="<?= showFormData('lname') ?>">
            <label for="lname" class="form-label">Last Name</label>
            <?= showError('lname') ?>
        </div>
    </div>


        <div class="mt-3">
            <table style="width: 100%;">
                <tr>
                    <td>
                        <input class="form-check-input" type="radio" name="gender" id="male" value="1" <?=isset($_SESSION['formdata'])?'':'checked'?> <?= showFormData('gender') == '1' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="male">Male</label>
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="gender" id="female" value="2" <?= showFormData('gender') == '2' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="gender" id="other" value="0" <?= showFormData('gender') == '0' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="other">Others</label>
                    </td>
                </tr>
            </table>
        </div>
        <br>

        <div class="form-floating mt-1">
            <input type="email" name="email" class="form-control rounded-0" id="exampleInputEmail1" placeholder="Email Address" value="<?= showFormData('email') ?>">
            <label for="exampleInputEmail1" class="form-label">Email Address</label>
            <?= showError('email') ?>
        </div>
        <br>

        <div class="form-floating mt-1">
            <input type="text" name="uname" class="form-control rounded-0" id="uname" placeholder="Username" value="<?= showFormData('uname') ?>">
            <label for="uname" class="form-label">Username</label>
            <?= showError('uname') ?>
        </div>
        <br>

        <div class="form-floating mt-1">
            <input type="password" name="password" class="form-control rounded-0" id="password" placeholder="Password">
            <label for="password" class="form-label">Password</label>
            <?= showError('password') ?>
        </div>

        <button type="submit" class="btn btn-primary mt-3" style="width: 100%; background-color: #e7c1fd; color: rgb(15, 43, 127);">Submit</button>
        
        <div style="text-align: center; margin-top: 10px;">
            <a href="?login" class="text-decoration-none">Already have an account</a>
        </div>
    </form>
</div>
