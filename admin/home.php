<?php
session_start();

require("../function/db_connect.php");


// ①ウェブ管理者が試合結果を手打ちで入力
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = filter_input(INPUT_POST,"date");


    $_SESSION["name"] = $name;
    $_SESSION["date"] = $date;

    header("location: ./game.php");
    return;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ページ</title>
</head>
<body>
    <h1>対戦カードの試合結果を打ち込みます</h1>
    <form action="./home.php" method="post">
        <select name="date">
            <option value="">GroupE</option>
            <option value="ドイツ-日本">ドイツ-日本</option>
            <option value="スペイン-コスタリカ">スペイン-コスタリカ</option>
            <option value="日本-コスタリカ">日本-コスタリカ</option>
            <option value="スペイン-ドイツ">スペイン-ドイツ</option>
            <option value="日本-スペイン">日本-スペイン</option>
            <option value="コスタリカ-ドイツ">コスタリカ-ドイツ</option>
        </select>
        <button type="submit">送信</button>
        <br>
    </form>

    <!-- <select name="date">
            <option value="">GroupA</option>
            <option value="カタール-エクアドル">カタール-エクアドル</option>
            <option value="セネガル-オランダ">セネガル-オランダ</option>
            <option value="カタール-セネガル">カタール-セネガル</option>
            <option value="オランダ-エクアドル">オランダ-エクアドル</option>
            <option value="エクアドル-セネガル">エクアドル-セネガル</option>
            <option value="オランダ-エクアドル">オランダ-エクアドル</option>
        </select>
        <input type="text" name="result">
        <button type="submit">送信</button> -->


    <a href="../userRoute/login/login_form.php">ログイン</a>
    <a href="./comparison.php">確認</a>
</body>
</html>