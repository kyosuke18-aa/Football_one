<?php
session_start();
require("../../function/db_connect.php");

$pdo = connect();

// ログインしているか判定
if (isset($_SESSION['name'])) {
    $username = $_SESSION['session_pass'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $date = $_SESSION['date'];
} else {
    // ログイン失敗の場合はリダイレクト
    header("location: ../login/login_form.php");
}

// 
$stmt = $pdo->prepare("SELECT user_name,date,score FROM user_yoso WHERE user_name = :user_name AND date = :date");
$stmt->bindParam(":date", $date);
$stmt->bindParam(":user_name", $name);
$stmt->execute();
$result = $stmt->fetch();


// $DBscoreがnullなら、処理実行
if (!isset($result["score"])) {
    $err = "受付中：予想してください。例）2-0　半角数字のみ";
} else {
    // scoreに値が格納されたら
    $DBscore = $result["score"];
}



// 予想スコアを格納する列データを作成
if (!$result) {
    $sql = ("INSERT INTO user_yoso (user_name,date) VALUES (:user_name,:date)");
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":user_name", $name);
    $stmt->bindParam(":date", $date);
    $stmt->execute();
}


// 設計書を読んでください
date_default_timezone_set('Asia/Tokyo');
$time = date("dG");


$genbon = explode(' ', $date);

// var_dump($date);

foreach ($genbon as $new) {
    if (!is_numeric($new)) {
        $game = $new;
    }
    if (is_numeric($new)) {
        $num = $new;
    }
}


// 正規表現
if (isset($_POST)) {
    $score = filter_input(INPUT_POST, "score");

    if (preg_match("/^[0-9]{1}-[0-9]{1}$/", $score)) {
        // tableデータと、session情報が一致するデータの更新
        $sql = ("UPDATE user_yoso SET score = :score WHERE user_name = :user_name AND date = :date");
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":score", $score);
        $stmt->bindParam(":user_name", $name);
        $stmt->execute();

        header("location: ./mypro.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スコア予想ページ</title>
    <link rel="stylesheet" href="../css/score.css">
</head>

<body>
    <div class="body">
        <!-- headerのタブ -->
        <div class="header">
            <div class="header-logo">
                <img src="../img/header-logo.jpg" alt="" width="100">
            </div>
            <div class="header-title">
                <h1>Football Expected Site</h1>
            </div>
            <div class="header-list">
                <ul>
                    <li><a href="./mypro.php">マイプロフィール</a></li>
                    <li><a href="./home.php">ホームに戻る</a></li>
                </ul>
            </div>
        </div>


        <div class="score">
            <h3>予想を始めましょう! <?php echo $name ?> さん</h3>
            <div id="real-clockbox">&nbsp;</div>
            <br>
            <p>-選択された試合-</p>
            <h3><?php echo $game ?></h3>



            <?php
            if ($time >= $num) {
                $time = "予想を締切ました、ポイントの変動は試合終了後に行われます。";
                echo "<h3>$time</h3>";
                $js = "js開始";

                $jsese = [
                    'd1' => $js
                ];

                $strJson = json_encode($jsese);
            } elseif (!isset($result["score"])) {
                echo "<h3>$err</h3>";
            } else {
                echo "<h4>$DBscore</h4>";
            }
            ?>



            <div class="scoreform">
                <form action="./score.php" method="post">
                    <input type="text" name="score" required>
                    <button type="submit">送信</button>
                </form>
            </div>
        </div>



    </div>
    <script src="../js/time.js"></script>

    <script>
        //PHPでJSON化したものをJavascriptのオブジェクトへ（デシリアライズ）
        const objData = JSON.parse('<?php print $strJson; ?>');

        //読み取り部１
        console.log(objData.d1);

        if (objData) {
            document.querySelector('.scoreform').remove();
        }
    </script>

</body>

</html>