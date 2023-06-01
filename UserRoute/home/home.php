<?php
session_start();
if (isset($_SESSION['name'])) {
    $username = $_SESSION['session_pass'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
} else {
    // ログイン失敗
    header("location: ../login/login_form.php");
}
// 試合データ一覧
require "./foreach.php";

require("../../function/db_connect.php");

class DB_operation
{
    public static function db_select($sql)
    {
        $stmt = connect()->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }
}

// DB接続
$pdo = connect();

// 所持ポイントが表示。昇順
$sql = "SELECT name,point FROM user ORDER BY point DESC LIMIT 5";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();
// $res = $stmt->fetchAll();

$obj = new DB_operation($sql);
$res = $obj::db_select($sql);


// ゲーム一覧を配列に格納する
$game = [];
$file = file("./foreach.php");
foreach ($sectionone as $one) {
    $game[] = $one;
}
foreach ($sectiontwo as $two) {
    $game[] = $two;
}
foreach ($sectionthree as $three) {
    $game[] = $three;
}





// 試合検索フォーム
if (isset($_POST["sach"])) {
    $sach_form = filter_input(INPUT_POST, "sach");
    $sach_res = preg_grep("/{$sach_form}/", $game);
    // header("location: ./home.php");
} else {
    $null = "開催される試合が検索できます。";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        main a {
            text-decoration: none;
        }

        body {
            background-color: #222426;
        }

        .areaone a {
            text-decoration: none;
            color: white;
        }

        .areatwo {
            border: 1px solid #292f33;
        }

        .areatwo a {
            color: white;
        }

        .areaone a:hover {
            color: #88badd;
        }

        .areatwo a:hover {
            color: #88badd;
        }

        .areaone {
            color: white;
        }
    </style>
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
                <div id="real-clockbox">&nbsp;</div>
            </div>
        </div>
            <div class="container">
                <div class="row">

                    <div class="areaone col-md-3 mt-5 py-3">
                        <p class="atag fs-6">こんにちは、<?php echo $name ?>さん</p>
                        <p class="atag fs-6 mr-3"><a href="./mypro.php">プロフィール</a></p>
                        <p class="atag fs-6 mr-3"><a href="./yosen.php">予選突破予想</a></p>
                        <p class="atag fs-6 mr-3"><a href="./quiz.php">W杯クイズ</a></p>
                        <p class="atag fs-6"><a href="../../admin/home/manual.php">サイトマニュアル</a></p>
                        <p class="atag fs-6"><a href="../login/logout.php">ログアウト</a></p>
                        <p>試合検索フォーム</p>
                        <form action="./home.php" method="post">
                            <input type="text" name="sach" required>
                            <button type="submit">検索</button>
                        </form>

                        <?php if (isset($sach_res)) : ?>
                            <?php foreach ($sach_res as $sach_row) : ?>
                                <p><a href="./discussion.php"><?php echo "{$sach_row}" ?></a></p>
                                <br>
                            <?php endforeach; ?>
                        <?php elseif (isset($null)) : ?>
                            <p><?php echo $null ?></p>
                        <?php endif; ?>

                    </div>

                    <div class="areatwo col-md-5 mt-5 py-1">
                        <main class="p-3">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#game1" class="nav-link active" data-bs-toggle="tab">第１節</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#game2" class="nav-link" data-bs-toggle="tab">第２節</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#game3" class="nav-link" data-bs-toggle="tab">第３節</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="game1" class="tab-pane active">
                                    <?php foreach ($sectionone as $row) : ?>
                                        <p><a href="./discussion.php"><?php echo $row ?><br></a></p>
                                    <?php endforeach; ?>
                                </div>
                                <div id="game2" class="tab-pane">
                                    <?php foreach ($sectiontwo as $row) : ?>
                                        <p><a href="./discussion.php"><?php echo $row ?><br></a></p>
                                    <?php endforeach; ?>
                                </div>
                                <div id="game3" class="tab-pane">
                                    <?php foreach ($sectionthree as $row) : ?>
                                        <p><a href="./discussion.php"><?php echo $row ?><br></a></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </main>
                    </div>




                    <div class="areaone col-md-4 mt-5 py-3">
                        <?php foreach ($res as $r) : ?>
                            <div class="foreach">
                                <p class="atag fs-6"><label>名前：</label><?php echo "{$r["name"]}" ?></p>
                                <p class="atag fs-6"><label>所持ポイント：</label><?php echo "{$r["point"]}pt" ?></p>
                            </div>
                        <?php endforeach; ?>


                    </div>




                </div>
            </div>



        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js
            " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM
            " crossorigin="anonymous ">
        </script>
        <script src="../js/time.js"></script>
</body>

</html>