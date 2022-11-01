<?php
session_start();
require("../../function/db_connect.php");

$pdo = connect();




if (isset($_SESSION['name'])){
    $userid = $_SESSION['session_pass'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $date = $_SESSION['date'];

}else{
    // ログイン失敗
    header("location: ../login/login_form.php");
}
    // score.phpで新しくユーザーデータを追加する処理


    // user_idと対戦カードが揃って保存してある列を検索する
    $stmt = $pdo->prepare("SELECT user_id,date,score FROM football WHERE user_id = ? AND date = ?");

    $arr = [];
    $arr[] = $name;
    $arr[] = $date;
    // var_dump($arr);
    $stmt->execute($arr);
    $result = $stmt->fetch();
    // var_dump($result);


    // 検索した結果がfalseだった場合,列の新規登録をする
    if(!$result){
        $sql = ("INSERT INTO football (user_id,date) VALUES (:user_id,:date)");
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":user_id",$name);
        $stmt->bindParam(":date",$date);
        $stmt->execute();
        // echo "ユーザーの新規情報を登録完了";
    }



// 正規表現
if(isset($_POST)){
    $score = filter_input(INPUT_POST,"score");
    if (preg_match("/[0-9]{1}-[0-9]{1}/", $score)) {
        // echo "すべて半角数字である";
        $err[] = $score;


        // sqlを発行 $dateとdateカラム、user_idと$nameのデータ一致
        $sql = ("UPDATE football SET score = :score WHERE user_id = :user_id AND date = :date");
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":date",$date);
        $stmt->bindParam(":score",$score);
        $stmt->bindParam(":user_id",$name);
        $test = $stmt->execute();


    } else {
        // echo "すべて半角数字ではない";
        $err[] = "正しい入力をしてください。例）２−０";
    }
}

$score = filter_input(INPUT_POST,"score");






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スコア予想ページ</title>
    <link rel="stylesheet" href="/css/score.css">
    <link rel="stylesheet" href="../css/score.css">
</head>
<body>
    <div class="body">
            <!-- headerのタブ -->
        <div class="header">
            <div class="header-logo">
                <img src="../img/header-logo.jpg" alt="" width="100">
            </div>
            <div class="header-title"><h1>Football Expected Site</h1></div>
            <div class="header-list">
                <p>マイプロフィール</p>
                <p>残り試合チケット</p>
                <a href="../home/home.php">ホームに戻る</a>
            </div>
        </div>


        <div class="score">
            <h3>予想を始めましょう! <?php echo $name ?> さん</h3>
            <br>
            <h3>-選択された試合-</h3>

            <h3><?php echo $date ?></h3>

            <h4>
                <?php foreach($err as $row):?>
                        <?php if(isset($row)) :?>
                            <p><?php echo $row ?></p>
                        <?php endif;?>
                <?php endforeach; ?>
            </h4>


            <form action="./score.php" method="post">
                <input type="text" name="score" required>
                <button type="submit">送信</button>
            </form>
        </div>



    </div>
</body>
</html>