<?php
include_once "Account.php";
include_once "AccountManager.php";
$accountManager = new AccountManager("account.json");
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
    <link rel="stylesheet" href="css/register.css">

    <style>
        fieldset {
            width: 100px;
        }
    </style>
    <body>
    <div class="user">
        <header class="user__header">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt=""/>
            <h1 class="user__title">A lightweight and simple sign-up form</h1>
        </header>

        <form class="form">
            <div class="form__group">
                <input type="text" placeholder="Username" class="form__input" name="account"/>
            </div>

            <div class="form__group">
                <input type="email" placeholder="Email" class="form__input"/>
            </div>

            <div class="form__group">
                <input type="password" placeholder="Password" class="form__input" name="password"/>
            </div>

            <button class="btn" type="submit" href="Log-in.php">Register</button>
        </form>
    </div>

    </body>
    </html>
    <script>const button = document.querySelector('.btn')
        const form = document.querySelector('.form')

        button.addEventListener('click', function () {
            form.classList.add('form--no')
        });</script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $account = $_REQUEST["account"];
    $password = $_REQUEST["password"];

    $data = [
        "account" => $account,
        "password" => $password
    ];

    if ($accountManager->checkRegister($account)) {
        $accountManager->add($data);
    } else {
        echo "This account has been register";
    }

    header("location:Log-in.php");
}

