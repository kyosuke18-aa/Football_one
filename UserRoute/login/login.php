<?php

require("/Applications/MAMP/htdocs/sinki/functions/db_connect.php");


// $pdo = connect();
$pdo = new PDO('mysql:host=localhost;dbname=tests;','root','root',[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]);

// email password
$email = filter_input(INPUT_POST,"email");
$password = filter_input(INPUT_POST,"password");
// パスワードの取得

// SQL発行
$stmt = $pdo->prepare("SELECT * FROM test WHERE email = ?");

$arr = [];
$arr[] = $email;

$stmt->execute($arr);
$result = $stmt->fetch();

// ユーザが存在するか判定する
if($result){

    // パスワードの比較を行う
    if (password_verify($password, $result['password'])){
        session_start();
        $_SESSION['session_pass'] = $result['id'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['name'] = $result['name'];
        $_SESSION['password'] = $result['password'];

        header('Location: ../home/home.php');
    }else{
        echo 'パスアワードが間違っています';
    }
}else{
    echo 'ユーザが存在しません';
}
