<?php
session_start();
// ① home.phpで選択された試合の結果を手打ち処理


require("../function/db_connect.php");
// データをupdateしたいデータカラムの試合データを選択
$date = $_SESSION["date"];


// DB接続
$pdo = connect();


// 選択した試合データが存在しているか検索
$sql = ("SELECT * FROM football WHERE date = :date");
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":date", $date);
$stmt->execute();
$res = $stmt->fetchAll();
// var_dump($res);

foreach($res as $row){
    echo $row['user_id'];
    echo $row['date'];
    echo $row['content'];
    echo "<br>";
}


if(!$res){
    echo "選択データが存在していません";
}



// result値送信を受け取り
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $result = filter_input(INPUT_POST,"result");
    // sql文発行
    $sql = "UPDATE football SET result = :result WHERE date = :date";
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
<h2><?php echo $date ;?></h2>


<form action="./game.php" method="post">
    <p><?php echo $date ?></p>
    <input type="text" name="result">
    <button type="submit">送信</button>
</form>

<p><a href="./home.php">管理者ホームページ</a></p>
<p><a href="./comparison.php">合計値データ挿入</a></p>
</body>
</html>

