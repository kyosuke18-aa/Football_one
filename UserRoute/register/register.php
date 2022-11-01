<?php
// DB接続するためのファイル読み込み
require("/Applications/MAMP/htdocs/sinki/functions/db_connect.php");

// ＄dbに関数を代入
$db = connect();


// // sqlを定義
$sql = ("INSERT INTO test (name,email,password) VALUES (:name,:email,:password)");


// // フォームの値を受け取る
$name = filter_input(INPUT_POST,"name");
$email = filter_input(INPUT_POST,"email");
$password = filter_input(INPUT_POST,"password");
$hashPass = password_hash($password,PASSWORD_DEFAULT);


// SQLの発行
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name,PDO::PARAM_STR);
$stmt->bindParam(':email', $email,PDO::PARAM_STR);
$stmt->bindParam(':password', $hashPass,PDO::PARAM_STR);


// // ユーザーが登録された場合の処理
$user = $stmt->execute();

// チケットのカラム値を更新
if($user){
    $name = filter_input(INPUT_POST,"name");

    $pdo = new PDO('mysql:host=localhost;dbname=tests;','root','root',[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]);
    $sql = ("UPDATE test SET ticket = 3 WHERE name = :name");
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":name", $name,PDO::PARAM_STR);
    $stmt->execute();

}else{
    echo "update構文失敗";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../login/login_form.php"><h1>完了しました</h1></a>
</body>
</html>
