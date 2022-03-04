<?php
    include_once "Account.php";
    include_once "AccountManager.php";
    $accountManager = new AccountManager("account.json");
    session_start();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/Style.css">
<style>
    fieldset{
        width:100px;
    }
</style>
<body>
<div>
    <form action="" method="post">
            <div id="login-box">
                <div class="left">
                    <h1>Sign up</h1>

                    <input type="text" name="account" placeholder="Username" />
                    <input type="password" name="password" placeholder="Password" />
                    <button type="submit" id="submit">LOGIN</button>
                    <button><a href="forgot.php" id="forgot">Forgot your account?</a></button>
                    <button><a href="Register.php" id="register">Don't have a account? Click here!</a></button>
                </div>

                <div class="right">
                    <span class="loginwith">Sign in with<br />social network</span>

                    <button class="social-signin facebook">Log in with facebook</button>
                    <button class="social-signin twitter">Log in with Twitter</button>
                    <button class="social-signin google">Log in with Google+</button>
                </div>
                <div class="or">OR</div>
            </div>
    </form>
</div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $account = $_REQUEST["account"];
    $password = $_REQUEST["password"];

    $data = $accountManager->loadDatafile();

    $log = $accountManager->checkAccount($account,$password);
    echo $log;

}

