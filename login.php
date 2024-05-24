<?php
session_start();

if (isset($_POST['btn_login'])) {
    echo 'Processing Login...';
    if ($_POST['username'] == 'admin' && $_POST
    ['password'] == 'rahasia') {
        echo 'Login Successful';
        // set session
        $_SESSION['username'] = 'admin';
        echo "<script>location.replace('index.php')</script>";
        
    } else {
        echo 'Login Failed<hr>';
    }
}


?>
<form action="" method="post">
    <input required minlength=3 maxlength=20 type="text" name="username" placeholder="User Name">
    <input required minlength=3 maxlength=20 type="password" name="password" placeholder="Password">
    <button name=btn_login>LOGIN</button>
</form>