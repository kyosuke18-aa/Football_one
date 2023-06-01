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


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ポイント獲得ページ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/quiz.css">
    <style>
        .body {
            background-color: #222426;
        }

        .areaone {
            color: white;
            border-right: 5px solid #292f33;
        }

        .row {
            color: white;
        }

        .areatwo {
            border-right: 5px solid #292f33;

        }

        .areaone a:hover {
            color: #88badd;
        }

        .areaone {
            color: white;
        }

        .areaone a:link {
            color: white;
        }
    </style>
</head>

<body>
    <div class="body">
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




        <div class="contanier">
            <div class="row">
                <div class="areaone col-md-3 py-5">
                    <p>ユーザーロケーション</p>
                    <p class="atag fs-6">こんにちは、<?php echo $name ?>さん</p>
                    <p class="atag fs-6 mr-3"><a href="./home.php">ホームに戻る</a></p>
                    <p class="atag fs-6 mr-3"><a href="./mypro.php">プロフィール</a></p>
                    <p class="atag fs-6 mr-3"><a href="./yosen.php">予選突破予想</a></p>
                    <p class="atag fs-6"><a href="../../admin/home/manual.php">サイトマニュアル</a></p>
                    <p class="atag fs-6"><a href="../login/logout.php">ログアウト</a></p>
                </div>
                <div class="areatwo col-md-6 py-5">
                    <p>問題を提示</p>
                    <div class="row">
                        <div class="areatwo col-md-4 py-5">
                            <p class="atag fs-6 mr-3"><a href="./quizdata/easy.php">難易度：Easy</a></p>
                            <p>・選手の名前</p>
                            <p>・W杯出場国に関する問題</p>
                        </div>
                        <div class="areatwo col-md-4 py-5">
                            <p class="atag fs-6 mr-3"><a href="./quizdata/nomal.php">難易度：Nomal</a></p>
                            <p>・W杯出場選手の詳細データ</p>
                            <p>・各チームの基本データ</p>
                        </div>
                        <div class="areatwo col-md-4 py-5">
                            <p class="atag fs-6 mr-3"><a href="./quizdata/hard.php">難易度：Hard</a></p>
                            <p>・W杯の名場面クイズ</p>
                        </div>
                    </div>
                </div>
                <div class="areathree col-md-3 py-5">
                    <p>ユーザーからのクイズを募集する言葉</p>
                </div>

            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js
            " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM
            " crossorigin="anonymous ">
        </script>
</body>

</html>