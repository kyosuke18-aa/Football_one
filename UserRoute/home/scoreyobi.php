<?php
session_start();
if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
    $userid = $_SESSION["session_pass"];
    $date = $_SESSION["date"];
} else {
    header("location: ../login/logout.php");
}
require_once("../../function/db_connect.php");


echo $name;
echo $userid;

echo "<br>";
echo $date;
echo "<hr>";
$pdo = connect();

// DBに検索したいデータが存在しているか確認する
$sql = "SELECT * from user_yoso WHERE user_name = :user_name AND date = :date";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":user_name", $name);
$stmt->bindParam(":date", $date);
$res = $stmt->execute();
$rrr = $stmt->fetch();
$yet = $rrr["date"];



if(!$yet){
    // 存在しない場合、下記のメッセージが表示される
    $no = "データが存在していません";
    echo $no;
}else{
    // 存在していた場合、下記のメッセージが表示される
    $ari = "データが存在しています。";
}


// ユーザーデータが既に存在しているか判定する
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$yet) {

        $score = filter_input(INPUT_POST, "score");
        echo $score;

        $insert = "INSERT INTO user_yoso(user_name,date,score) VALUES(:user_name,:date,:score)";
        $stmt = $pdo->prepare($insert);
        $stmt->bindParam(":user_name", $name);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":score", $score);
        $stmt->execute();
        echo "保存完了";
    }
}




echo $yet;
echo $rrr["score"];


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
    <div class="body">
        <h4>スコア予想ページを複製</h4>
        <p>・困難なプログラムを再確認するため</p>
    </div>
    <div class="form">
        <form action="./scoreyobi.php" method="post">
            <input type="text" name="score">
            <button>予想する</button>
        </form>
    </div>
</body>

</html>