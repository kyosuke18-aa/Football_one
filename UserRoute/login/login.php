<?php

require("../../function/db_connect.php");


$pdo = connect();

// email password
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");

// パスワードの取得

// SQL発行
$stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");

$arr = [];
$arr[] = $email;

$stmt->execute($arr);
$result = $stmt->fetch();

// ユーザが存在するか判定する
if ($result) {

    // パスワードの比較を行う
    if (password_verify($password, $result['password'])) {
        session_start();
        $_SESSION['session_pass'] = $result['id'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['name'] = $result['name'];
        $_SESSION['password'] = $result['password'];

        header('Location: ../home/home.php');
    } else {
        $error = 'パスワードが一致しません';
    }
} else {
    $error = 'ユーザが存在しません';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン失敗</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .home {
            margin: 3.0rem;
        }

        a {
            color:rgb(138, 171, 243);
        }
    </style>
</head>

<body>
    <div class="body">
        <div class="header">
            <div class="header-logo">
                <img src="../img/header-logo.jpg" alt="" width="100">
            </div>
            <div class="header-title">
                <h1>Football Expected Site</h1>
            </div>
            <div class="header-list">
                <div id="real-clockbox">&nbsp;</div>
            </div>
        </div>

        <div class="container">
            <div class="home">


                <?php
                if ($error) {
                    echo "<h4>$error</h4>";
                }
                ?>

                <a href="./login_form.php">ログインフォームに戻る</a>
            </div>
        </div>




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js
            " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM
            " crossorigin="anonymous ">
    </script>
</body>

</html>