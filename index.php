<?php
require_once 'assets/php/functions.php';

if (isset($_GET['newfp'])) {
    unset($_SESSION['auth_temp']);
    unset($_SESSION['forgot_email']);
    unset($_SESSION['forgot_code']);
}
if (isset($_SESSION['Auth']) ) {
    $user =getUser($_SESSION['userdata']['id']); 
}

$pageCount = count($_GET);


// Manage pages 
if (isset($_SESSION['Auth']) && $user['ac_status'] == 1 && !$pageCount) {
    showPage('header',['page_title'=>'Home']);
    showPage('navbar');
    showpage('wall');
        
} elseif (isset($_SESSION['Auth']) && $user['ac_status'] == 0 && !$pageCount) {
    showPage('header',['page_title'=>'Verify your email']);
    showPage('verify_email');
        
} elseif (isset($_SESSION['Auth']) && $user['ac_status'] == 2 && !$pageCount ) {
    showPage('header',['page_title'=>'Blocked']);
    showPage('blocked');
        
} elseif (isset($_GET['signup'])) {
    showPage('header',['page_title'=>'SignUp']);
    showPage('signup');

} elseif (isset($_GET['login'])) {
    showPage('header',['page_title'=>'Login']);
    showPage('login');

} elseif (isset($_GET['forgotpassword'])) {
    showPage('header',['page_title'=>'Forgot password']);
    showPage('forgot_password');

} elseif (isset($_SESSION['Auth']) && isset($_GET['edit_profile'])&& $user['ac_status'] == 1 ) {
    
    showPage('header',['page_title'=>'Edit Profile']);
    showPage('navbar');
    showPage('edit_profile');

} elseif (isset($_GET['changepassword'])) {
    showPage('header',['page_title'=>'change_password']);
    showPage('forgot_password');
}else {
    if(isset($_SESSION['Auth'])&& $user['ac_status'] == 1 ){
        showPage('header',['page_title'=>'Home']);
        showPage('navbar');
        showpage('wall');
    }elseif (isset($_SESSION['Auth']) && $user['ac_status'] == 0 ) {
        showPage('header',['page_title'=>'Verify your email']);
        showPage('verify_email');
            
    } elseif (isset($_SESSION['Auth']) && $user['ac_status'] == 2 ) {
        showPage('header',['page_title'=>'Blocked']);
        showPage('blocked');
            
    }else{
        showPage('header',['page_title'=>'Login']);
        showPage('login');
    }
}
// Unset session variables
unset($_SESSION['error']);
unset($_SESSION['formdata']);
?>
