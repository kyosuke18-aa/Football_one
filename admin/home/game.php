<?php
session_start();
// ① home.phpで選択された試合の結果を手打ち処理


require("../../function/db_connect.php");
// データをupdateしたいデータカラムの試合データを選択
$date = $_SESSION["date"];
echo $date;

// DB接続
$pdo = connect();


// 試合データを予想しているユーザーがいるか検索
$sql = ("SELECT * FROM user_yoso WHERE date = :date");
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":date", $date);
$stmt->execute();
$res = $stmt->fetchAll();


if (!$res) {
    $err = "試合データが存在していません。ユーザが予想していません。";
    echo $err;
}



// result値送信を受け取り
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = filter_input(INPUT_POST, "result");
    // sql文発行
    $sql = "UPDATE user_yoso SET result = :result WHERE date = :date";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":result", $result);
    $stmt->bindParam(":date", $date);
    $stmt->execute();
    header("location: ./comparison.php");
    return;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>試合結果打ち込み</title>
</head>

<body>

    <h2>選択された試合</h2>
    <h1>＜ 予想済みユーザー一覧 ＞</h1>
    <?php

    foreach ($res as $row) {
        echo $row['user_name'];
        echo $row['date'];
        echo "<br>";
    }

    ?>



    <h2>試合結果を打ち込んでください</h2>
    <h1><?php echo $date; ?></h1>
    <form action="./game.php" method="post">
        <input type="text" name="result">
        <button type="submit">送信</button>
    </form>

    <p><a href="./home.php">管理者ホームページ</a></p>
    <p><a href="./comparison.php">合計値データ挿入</a></p>
</body>

</html>