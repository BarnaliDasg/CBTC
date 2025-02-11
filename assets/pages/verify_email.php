<?php
$user = $_SESSION['userdata'];
$verificationCode = $_SESSION['code'];
?>

<div style="display: flex; justify-content: center; align-items: center; height: 100vh; width: 70%; max-width: 600px; margin: 0 auto;">
    <div style="width: 100%;" class="col-4 bg-white border rounded p-4 shadow-sm">
        <form method="post" action="assets/php/actions.php?verify_email">
            <h1 class="h5 mb-3 fw-normal text-center">Verify Your Email (<?= htmlspecialchars($user['email']) ?>)</h1>
            <p class="text-center">Enter the 6-digit code sent to you</p>

            <!-- Display the code for testing purposes (remove for production) -->
            <p class="text-center text-danger">Your verification code: <strong><?= htmlspecialchars($verificationCode) ?></strong></p>

            <div class="form-floating mt-1">
                <input type="text" name="code" class="form-control rounded-0" id="floatingPassword" placeholder="######" minlength="6" maxlength="6" required pattern="\d{6}">
                <label for="floatingPassword">######</label>
            </div>

            <?php if (isset($_SESSION['error']['msg'])): ?>
                <p class="text-danger"><?= htmlspecialchars($_SESSION['error']['msg']) ?></p>
                <?php unset($_SESSION['error']['msg']); ?>
            <?php endif; ?>

            <div class="mt-3 d-flex flex-column gap-2">
                <button class="btn" type="submit" style="width: 100%; background-color: #e7c1fd; color: rgb(15, 43, 127);">Verify Email</button>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
            <a href="assets/php/actions.php?resendCode" class="text-decoration-none mt-2">Resend Email</a>
            <a href="assets/php/actions.php?logout" class="text-decoration-none">Logout</a>
            </div>
            <?php if (isset($_SESSION['message'])): ?>
              <p class="text-success"><?= htmlspecialchars($_SESSION['message']); ?></p>
              <?php unset($_SESSION['message']); ?>
            <?php elseif (isset($_SESSION['error']['msg'])): ?>
              <p class="text-danger"><?= htmlspecialchars($_SESSION['error']['msg']); ?></p>
            <?php endif; ?>

        </form>
    </div>
</div>