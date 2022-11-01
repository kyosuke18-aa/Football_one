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


require "./foreach.php";

foreach ($sectionone as $row){
}
foreach ($sectiontwo as $row){
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホームページ</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2? family= Ubuntu:ital,wght@1,300 & display=swap" rel="stylesheet">
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
                <p>こんにちは、<?php echo $name ?> さん！</p>
                <a href="../login/logout.php">ログアウト</a>
            </div>
        </div>

        <div class="content">
            <!-- ユーザーのポイントランキングを表示 -->
            <div class="pointranking">
                <h3>ユーザーのポイントランキング</h3>
                <p>メッシ愛好家 10pt</p>
            </div>

            <!-- タブ切り替え -->
            <div class="tab-panel">
                <!--タブ-->
                <ul class="tabs">
                    <li class="tab tab-A is-active">第１節</li>
                    <li class="tab tab-B">第２節</li>
                    <li class="tab tab-C">第３節</li>
                </ul>

                <!--タブを切り替えて表示するコンテンツ-->
                <div class="panels">
                    <div class="panel tab-A is-show">
                    <?php foreach ($sectionone as $row):?>
                    <p><a href="./discussion.php"><?php echo $row ?><br></a></p>
                    <?php endforeach; ?>
                    </div>
                    <div class="panel tab-B">
                        <?php foreach ($sectiontwo as $row):?>
                        <p><a href="./discussion.php"><?php echo $row ?><br></a></p>
                        <?php endforeach; ?>

                    </div>
                    <div class="panel tab-C">
                        <?php foreach ($sectionthree as $row):?>
                        <p><a href="./discussion.php"><?php echo $row ?><br></a></p>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>


        </div>










    </div>

    <script></script>
    <script src="../js/main.js"></script>
</body>
</html>