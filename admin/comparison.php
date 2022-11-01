<?php
session_start();
require("../function/db_connect.php");

// ① 予想と結果を比較
// ② teststableでポイントを増やす
// ③ footballテーブルのポイントに合計

// DB接続
$pdo = connect();

$date = $_SESSION["date"];
$name = $_SESSION["name"];



$sql = "SELECT user_id,score,result FROM football WHERE date = :date";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":date", $date);
$stmt->execute();
$score = $stmt->fetchAll();

foreach ($score as $s) {
    $score = $s["score"];
    $result = $s["result"];
    echo "<br>";
    echo $score;
    echo $result;

    // sqlのupdate文開始 True
    $two = ("UPDATE football SET point = 10 WHERE date = :date AND score = result");
    $stmt = $pdo->prepare($two);
    $stmt->bindParam(":date", $date);
    $res = $stmt->execute();

    // False
    $three = ("UPDATE football SET point = 3 WHERE date = :date AND score = !result");
    $stm = $pdo->prepare($three);
    $stm->bindParam("date", $date);
    $stm->execute();
}

// nameの複数情報のポイントを合計
$name = filter_input(INPUT_POST,"name");

$four = "SELECT point FROM football WHERE user_id = :user_id";
$st = $pdo->prepare($four);
$st->bindParam(":user_id", $name);
$st->execute();
$after = $st->fetchAll();

echo "<br>";


$total = 0;
foreach ($after as $date) {
    $total += $date['point'];
}

echo "foreach::". $total;

if($total > 0){
    // 集計したポイントをtestポイントに格納
    $five = ("UPDATE test SET point = $total WHERE name = :name");
    $s = $pdo->prepare($five);
    $s->bindParam(":name",$name);
    $s->execute();
    echo "合計データ追加";
}else{
    echo "集計元データがありません";
}






?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザーのポイントページ</title>
</head>

<body>
    <form action="./comparison.php" method="post">
        <input type="text" name="name">
        <button type="submit">送信</button>
    </form>

    <a href="./home.php">ホームに戻る</a>
</body>

</html>