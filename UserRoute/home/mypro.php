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

// DB接続
$pdo = connect();

// session[name]のデータ列を検索
$sql = "SELECT * from user_yoso WHERE user_name = :user_name";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":user_name", $name);
$stmt->execute();
$userdate = $stmt->fetchAll();

$two = "SELECT * from user WHERE name = :name";
$stm = $pdo->prepare($two);
$stm->bindParam(":name", $name);
$stm->execute();
$point = $stm->fetch();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $win_team = filter_input(INPUT_POST, "win_team");
    $sq = ("UPDATE user SET win_team = :win_team WHERE name = :name");
    $stm = $pdo->prepare($sq);
    $stm->bindParam(":name", $name);
    $stm->bindParam(":win_team", $win_team);
    $stm->execute();


    header("location: ./mypro.php");
    return;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイプロフィールページ</title>
    <link rel="stylesheet" href="../css/mypro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-color: #222426;
        }

        .areaone {
            color: white;
            border-right: 5px solid #292f33;

        }

        .areaone a {
            color: white;
            text-decoration: none;
        }

        .areaone a:hover {
            color: #88badd;
        }

        .areatwo {
            color: white;
            border: 1px solid white;
            height: 80vh;
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
                <div id="real-clockbox">&nbsp;</div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="areaone col-md-2 py-5">
                    <p class="atag fs-6"><a href="./home.php">ホームに戻る</a></p>
                    <p class="atag fs-6"><a href="../login/logout.php">ログアウト</a></p>
                    <p class="atag fs-6"><a href="../../admin/home/manual.php">サイトマニュアル</a></p>

                </div>



                <div class="areatwo col-md-4 py-5">
                    <p class="fs-4">優勝予想：<?php echo $point["win_team"] ?></p>
                    <p class="fs-4">合計ポイント：<?php echo $point["point"] ?>pt</p>
                    <p class="fs-4">予想試合一覧 ：<?php echo $name ?></p>

                    <?php foreach ($userdate as $date) : ?>
                        <p class="fs-6"><?php echo "{$date["date"]}： {$date["score"]}"; ?></p>
                    <?php endforeach; ?>

                </div>


                <div class="areaone col-md-6 py-5">
                    <p>カタールW杯の成績予想</p>


                    <p>優勝チーム🏆（予想を選択）</p>
                    <form action="./mypro.php" method="post">
                        <select name="win_team">
                            <option value="🇧🇷ブラジル">🇧🇷ブラジル</option>
                            <option value="🇧🇪ベルギー">🇧🇪ベルギー</option>
                            <option value="🇦🇷アルゼンチン">🇦🇷アルゼンチン</option>
                            <option value="🇫🇷フランス">🇫🇷フランス</option>
                            <option value="🏴󠁧󠁢󠁥󠁮󠁧󠁿イングランド">🏴󠁧󠁢󠁥󠁮󠁧󠁿イングランド</option>
                            <option value="🇪🇸スペイン">🇪🇸スペイン</option>
                            <option value="🇳🇱オランダ">🇳🇱オランダ</option>
                            <option value="🇵🇹ポルトガル">🇵🇹ポルトガル</option>
                            <option value="🇩🇰デンマーク">🇩🇰デンマーク</option>
                            <option value="🇩🇪ドイツ">🇩🇪ドイツ</option>
                            <option value="🇭🇷クロアチア">🇭🇷クロアチア</option>
                            <option value="🇺🇾ウルグアイ">🇺🇾ウルグアイ</option>
                            <option value="🇯🇵日本">🇯🇵日本</option>
                            <option value="🇰🇷韓国">🇰🇷韓国</option>
                            <option value="🇪🇨エクアドル">🇪🇨エクアドル</option>
                            <option value="🇸🇳セネガル">🇸🇳セネガル</option>
                            <option value="🇮🇷イラン">🇮🇷イラン</option>
                            <option value="🇺🇸アメリカ">🇺🇸アメリカ</option>

                            <option value="🏴󠁧󠁢󠁷󠁬󠁳󠁿ウェールズ">🏴󠁧󠁢󠁷󠁬󠁳󠁿ウェールズ</option>
                            <option value="🇸🇦サウジアラビア">🇸🇦サウジアラビア</option>
                            <option value="🇲🇽メキシコ">🇲🇽メキシコ</option>

                            <option value="🇵🇱ポーランド">🇵🇱ポーランド</option>
                            <option value="🇦🇺オーストラリア">🇦🇺オーストラリア</option>
                            <option value="🇹🇳チュニジア">🇹🇳チュニジア</option>

                            <option value="🇨🇷コスタリカ">🇨🇷コスタリカ</option>
                            <option value="🇨🇦カナダ">🇨🇦カナダ</option>
                            <option value="🇲🇦モロッコ">🇲🇦モロッコ</option>

                            <option value="🇬🇭ガーナ">🇬🇭ガーナ</option>
                            <option value="🇨🇭スイス">🇨🇭スイス</option>
                            <option value="🇨🇲カメルーン">🇨🇲カメルーン</option>
                            <option value="🇷🇸セルビア">🇷🇸セルビア</option>
                        </select>
                        <button>送信</button>
                    </form>
                    <p>※本戦出場チームが決まり次第締切</p>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js
            " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM
            " crossorigin="anonymous ">
        </script>
        <script src="../js/time.js"></script>
    </div>
</body>

</html>