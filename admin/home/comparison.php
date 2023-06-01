<?php
session_start();
require("../../function/db_connect.php");

// ① 予想と結果を比較
// ② teststableでポイントを増やす
// ③ footballテーブルのポイントに合計

// DB接続
$pdo = connect();

$date = $_SESSION["date"];
// $name = $_SESSION["name"];



$sql = "SELECT user_name,date,score FROM user_yoso WHERE date = :date";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":date", $date);
$stmt->execute();
$scores = $stmt->fetchAll();



foreach ($scores as $s) {
    $score = $s["score"];
    $dbdate = $s["date"];
    $dbname = $s["user_name"];
    echo "{$score} - {$dbname}<br>";
    // true
    $two = ("UPDATE user_yoso SET point = 100 WHERE date = :date AND score = result AND user_name = :user_name");
    $stm = $pdo->prepare($two);
    $stm->bindParam(":date", $dbdate);
    $stm->bindParam(":user_name", $dbname);
    // データ追加成功を変数で判定
    $true = $stm->execute();


    // False
    $three = ("UPDATE user_yoso SET point = 50 WHERE date = :date AND score != result AND user_name = :user_name");
    $stm = $pdo->prepare($three);
    $stm->bindParam(":date", $dbdate);
    $stm->bindParam(":user_name", $dbname);
    $false = $stm->execute();
}


// nameの複数情報のポイントを合計
$name = filter_input(INPUT_POST, "name");

$four = "SELECT point FROM user_yoso WHERE user_name = :user_name";
$st = $pdo->prepare($four);
$st->bindParam(":user_name", $name);
$st->execute();
$after = $st->fetchAll();

$total = 0;
foreach ($after as $date) {
    $total += $date['point'];
}

echo "<br>";
echo "foreach::" . $total;

if ($total > 0) {
    // 集計したポイントをtestポイントに格納
    $five = ("UPDATE user SET point = $total WHERE name = :name");
    $s = $pdo->prepare($five);
    $s->bindParam(":name", $name);
    $s->execute();
    echo "合計データ追加";
} else {
    echo "ユーザーネームを選択してください";
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
    <h4>↑</h4>
    <p><?php echo "上記のユーザーが[{$date}]試合を予想しています" ;?></p>
    <hr>
    <p>① 選択された試合に、予想者が存在するか検索</p>
    <p>② 予想者を選択する</p>
    <p>③ football値をuser値に加算する</p>
    <p>④ このページ終了</p>

    <?php echo $name; ?>
    <h2><?php echo $date; ?></h2>

    <form action="./comparison.php" method="post">
        <input width="200" type="text" name="name" placeholder="上記のユーザーの合計を求める">
        <button type="submit">送信</button>
    </form>

    <a href="./game.php">データ打ち込みページ</a>
    <a href="./home.php">ホームに戻る</a>
</body>

</html>