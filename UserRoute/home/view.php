<?php
session_start();
if (isset($_SESSION['name'])){
    $userid = $_SESSION['session_pass'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];


}else{
    // ログイン失敗
    header("location: ../login/login_form.php");
}

require("../../function/db_connect.php");

// discussion.phpで選択した試合カードをdateカラムに保存するための変数代入
$date = $_SESSION['date'];

$pdo = connect();

// 選択された試合カードが入っている列情報を探す,nullではない値を取り出す
$sql = "SELECT * from football WHERE date = :date AND content is not null";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":date",$date);
$stmt->execute();
$res = $stmt->fetchAll();


//　ログインユーザーが保持しているdateカラムに選択した、試合情報がない場合新規登録
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $two = ("INSERT INTO football (user_id, date, content) VALUES (:user_id , :date, :content)");
    // 値を受け取る
    $usre_id = $name;
    $datecontent = filter_input(INPUT_POST,"date");
    $content = filter_input(INPUT_POST,"content");

    $stmt = $pdo->prepare($two);
    $stmt->bindParam(":user_id", $usre_id);
    $stmt->bindParam(":date",$datecontent);
    $stmt->bindParam(":content",$content);
    $stmt->execute();

    header("Location: ./view.php");
    return;
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>討論ページ</title>
    <link rel="stylesheet" href="../css/view.css">
</head>
<body>
    <div class="body">
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

        <div class="content">
            <div class="form">
                <h2>討論送信フォーム</h2>
                <br>
                <h4>名前： <?php echo $name ?></h4>
                <h4>対戦データ： <?php echo $date ?></h4>
                <form action="./view.php" method="post">
                    <textarea name="content" id="" cols="30" rows="10" width="100" required></textarea>
                    <!-- <input type="text" name="content" width="200"> -->
                    <input type="hidden" name="date" value="<?php echo $date; ?>">
                    <button type="submit">送信</button>
                </form>
                <br>
                <a href="./discussion.php"><h4>試合選択ページ</h4></a>
                <a href="./score.php"><h4>予想ページ</h4></a>
            </div>

            <div class="listcontent">
                <h2>ユーザー討論上（ <?php echo $date ?> ）</h2>
                <br>
                    <?php foreach ($res as $row):?>
                        <div class="foreach">
                            <h3><label>名前：</label><?php echo $row['user_id'] ?></h3>
                            <h3><label>投稿内容：</label><?php echo $row['content'] ?></h3>
                        </div>
                    <?php endforeach; ?>
            </div>

            <div class="right">
                <div class="ad">
                    <p>広告</p>
                </div>

                <!-- APIで記事を取得 -->
                <div class="api">
                    <p>黄色の枠の中では、サッカーの記事を表示</p>
                </div>
            </div>

        </div>







    </div>
</body>
</html>