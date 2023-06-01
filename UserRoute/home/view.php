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
require("../../function/db_connect.php");



// 選択された試合を変数に格納
$date = $_SESSION['date'];

$pdo = connect();


// 試合へのコメントを読み込む
$sql = "SELECT
user_comment.id, user_comment.user_name, user_comment.date, user_comment.content, user_yoso.date, user_yoso.score
FROM
user_comment LEFT OUTER JOIN user_yoso ON user_comment.user_name = user_yoso.user_name AND user_comment.date = user_yoso.date
WHERE user_comment.date = :date AND content is not null  ORDER BY id DESC";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":date", $date);
$stmt->execute();
$res = $stmt->fetchAll();

//　コメントテーブル列を新しく作成
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = ("INSERT INTO user_comment (user_name, date, content) VALUES (:user_name , :date, :content)");
    $usre_name = $name;
    $datecontent = filter_input(INPUT_POST, "date");
    $content = filter_input(INPUT_POST, "content");

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":user_name", $usre_name);
    $stmt->bindParam(":date", $datecontent);
    $stmt->bindParam(":content", $content);
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
    <title>チャットページ</title>
    <link rel="stylesheet" href="../css/view.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-color: #222426;
        }

        .areaone {
            color: white;
        }

        .areatwo {
            color: #e1e8ed;
            border-right: 4px solid #292f33;
            border-left: 4px solid #292f33;
        }

        .areaone a {
            color: white;
            text-decoration: none;
            transition: 0.3s all;
        }

        .areaone a:hover {
            color: #88badd;
        }

        .areatwo .comment-a {
            border: 2px solid #292f33;
        }

        .areatwo .comment-b {
            border: 2px solid #292f33;
            /* width: 60%; */
        }
    </style>
</head>

<body>
    <div class="body">
        <div class="header sticky-top">
            <div class=" header-logo">
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
                    <p class="atag fs-5"><a href="./discussion.php">Back -> 試合選択</a></p>
                    <p class="atag fs-5"><a href="./scoreyobi.php">Next -> 試合予想ページ</a></p>
                    <p class="atag fs-6"><a href="./mypro.php">マイプロフィール</a></p>
                    <p class="atag fs-6"><a href="./home.php">ホームに戻る</a></p>
                    <p class="atag fs-6"><a href="../login/logout.php">ログアウト</a></p>
                    <p class="fs-6">ログイン：<?php echo $name ?></p>
                    <p class="fs-6">試合： <?php echo $date ?></p>
                </div>

                <div class="areatwo col-md-6 pt-2">
                    <h2 class="fs-4 fw-bold text-center  pb-3 mt-3">チャット送信フォーム　&　ユーザーチャット</h2>

                    <form action="./view.php" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="mt-2">チャット開始</label>
                            <input type="hidden" name="date" value="<?php echo $date; ?>">
                            <textarea class="form-control" name="content" required id="exampleFormControlTextarea1" rows="3" style="resize: none" width="60"></textarea>
                            <button type="submit" class="btn btn-primary mt-3">送信</button>
                        </div>
                    </form>

                    <!-- <h2 class="text-center">ユーザーチャット</h2> -->
                    <!-- 自分以外のユーザー投稿 -->
                    <?php foreach ($res as $row) : ?>
                        <div class="All-list">
                            <?php if ($name === $row['user_name']) : ?>
                                <div class="comment-a">
                                    <h5><label><?php echo $row['user_name'] ?>
                                            （<?php echo $row['score'] ?>）
                                        </label></h5>
                                    <h5><label><?php echo $row['content'] ?></label></h5>
                                </div>

                            <?php else : ?>
                                <div class="comment-b text-end">
                                    <h5><label> 　　<?php echo $row['user_name'] ?>
                                            （<?php echo $row['score'] ?>）　　
                                        </label></h5>
                                    <h5><label><?php echo $row['content'] ?></label></h5>
                                </div>

                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="col-md-3 pt-2">
                    <div class="iframely-embed">
                        <div class="iframely-responsive" style="height: 140px; padding-bottom: 0;">
                            <a href="https://www.soccer-king.jp/news/world/wc/20221121/1710810.html" data-iframely-url="//iframely.net/P3Zk96c?card=small"></a>
                        </div>
                    </div>
                    <script async src="//iframely.net/embed.js"></script>
                    <div class="iframely-embed">
                        <div class="iframely-responsive" style="height: 140px; padding-bottom: 0;"><a href="https://www.soccer-king.jp/news/world/wc/20221121/1710951.html" data-iframely-url="//iframely.net/SBzIqM9?card=small"></a></div>
                    </div>
                    <script async src="//iframely.net/embed.js"></script>
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