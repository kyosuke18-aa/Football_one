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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = filter_input(INPUT_POST, 'date');
    $_SESSION['date'] = $post;
    header('Location: view.php');
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>試合選択画面</title>
    <link rel="stylesheet" href="../css/discussion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #222426;
        }

        .areaone {
            color: white;
            border-right: 5px solid #292f33;
        }

        .areatwo {
            color: white;
        }

        .areaone a {
            text-decoration: none;
            color: white;
            transition: all 0.2s;
        }

        .areaone a:hover {
            color: #88badd;
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

        <div class="container">
            <div class="row">
                <div class="areaone col-md-3 py-5">
                    <p class="atag fs-5">Next -> 試合を選択してください</p>
                    <p class="fs-6">ログイン：<?php echo $name ?></p>
                    <p class="atag fs-6"><a href="./mypro.php">マイプロフィール</a></p>
                    <p class="atag fs-6"><a href="./home.php">ホームに戻る</a></p>
                    <p class="atag fs-6"><a href="../login/logout.php">ログアウト</a></p>
                </div>


                <div class="areatwo col-md-9 py-5">
                    <div class="row">
                        <div class="areatwo col-md-4 mt-3">
                            <div class="gamegroup">
                                <form action="./discussion.php" method="post">
                                    <h3>GroupA</h3>
                                    <select name="date">
                                        <option value="カタール🇶🇦vs🇪🇨エクアドル 1611">第１節　カタール🇶🇦vs🇱🇹エクアドル</option>
                                        <option value="セネガル🇸🇳vs🇳🇱オランダ 1711">第１節　セネガル🇸🇳vs🇳🇱オランダ</option>
                                        <option value="カタール🇶🇦vs🇨🇲セネガル 1811">第２節　カタール🇶🇦vs🇨🇲セネガル</option>
                                        <option value="オランダ🇳🇱vs🇱🇹エクアドル 1911">第２節　オランダ🇳🇱vs🇱🇹エクアドル</option>
                                        <option value="オランダ🇳🇱vs🇶🇦カタール 2011">第３節　オランダ🇳🇱vs🇶🇦カタール</option>
                                        <option value="エクアドル🇱🇹vs🇸🇳セネガル 2111">第３節　エクアドル🇱🇹vs🇸🇳セネガル</option>
                                    </select>
                                    <button type="submit">選択</button>
                                </form>
                            </div>
                            <div class="gamegroup">
                                <form action="" method="post">
                                    <h3>GroupD</h3>
                                    <select name="date">
                                        <option value="デンマーク🇩🇰vs🇹🇳チュニジア 1611">第１節　デンマーク🇩🇰vs🇹🇳チュニジア</option>
                                        <option value="フランス🇫🇷vs🇦🇺オーストラリア 1711">第１節　フランス🇫🇷vs🇦🇺オーストラリア</option>
                                        <option value="チュニジア🇹🇳vs🇦🇺オーストラリア 1811">第２節　チュニジア🇹🇳vs🇦🇺オーストラリア</option>
                                        <option value="フランス🇫🇷vs🇩🇰デンマーク 1911">第２節　フランス🇫🇷vs🇩🇰デンマーク</option>
                                        <option value="チュニジア🇹🇳vs🇫🇷フランス 2011">第３節　チュニジア🇹🇳vs🇫🇷フランス</option>
                                        <option value="オーストラリア🇦🇺vs🇩🇰 デンマーク 2111">第３節　オーストラリア🇦🇺vs🇩🇰デンマーク</option>
                                    </select>
                                    <button type="submit">選択</button>
                                </form>
                            </div>
                            <div class="gamegroup">
                                <form action="" method="post">
                                    <h3>GroupG</h3>
                                    <select name="date">
                                        <option value="スイス🇨🇭 vs 🇨🇲カメルーン 1111">第１節　スイス🇨🇭vs🇨🇲カメルーン</option>
                                        <option value="ブラジル🇧🇷 vs 🇷🇸セルビア 1211">第１節　ブラジル🇧🇷vs🇷🇸セルビア</option>
                                        <option value="カメルーン🇨🇲 vs 🇷🇸セルビア 1311">第２節　カメルーン🇨🇲vs🇷🇸セルビア</option>
                                        <option value="ブラジル🇧🇷 vs 🇨🇭スイス 1411">第２節　ブラジル🇧🇷vs🇨🇭スイス</option>
                                        <option value="カメルーン🇨🇲 vs 🇧🇷ブラジル 1511">第３節　カメルーン🇨🇲vs🇧🇷ブラジル</option>
                                        <option value="セルビア🇷🇸 vs 🇨🇭スイス 1611">第３節　セルビア🇷🇸vs🇨🇭スイス</option>
                                    </select>
                                    <button type="submit">選択</button>
                                </form>
                            </div>


                        </div>
                        <div class="areatwo col-md-4 mt-3">
                            <div class="gamegroup">
                                <form action="" method="post">
                                    <h3>GroupB</h3>
                                    <select name="date">
                                        <option value="イングランド🏴󠁧󠁢󠁥󠁮󠁧󠁿 vs 🇮🇷イラン 2101">第１節　イングランド🏴󠁧󠁢󠁥󠁮󠁧󠁿vs🇮🇷イラン</option>
                                        <option value="アメリカ🇺🇸 vs 🏴󠁧󠁢󠁷󠁬󠁳󠁿ウェールズ 2102">第１節　アメリカ🇺🇸vs🏴󠁧󠁢󠁷󠁬󠁳󠁿ウェールズ</option>
                                        <option value="ウェールズ🏴󠁧󠁢󠁷󠁬󠁳󠁿 vs 🇮🇷イラン 2103">第２節　ウェールズ🏴󠁧󠁢󠁷󠁬󠁳󠁿vs🇮🇷イラン</option>
                                        <option value="イングランド🏴󠁧󠁢󠁥󠁮󠁧󠁿 vs 🇺🇸アメリカ 2104">第２節　イングランド🏴󠁧󠁢󠁥󠁮󠁧󠁿vs🇺🇸アメリカ</option>
                                        <option value="イラン🇮🇷 vs 🇺🇸アメリカ 2105">第３節　イラン🇮🇷vs🇺🇸アメリカ</option>
                                        <option value="ウェールズ🏴󠁧󠁢󠁷󠁬󠁳󠁿 vs 🏴󠁧󠁢󠁥󠁮󠁧󠁿イングランド 2106">第３節　ウェールズ🏴󠁧󠁢󠁷󠁬󠁳󠁿vs🏴󠁧󠁢󠁥󠁮󠁧󠁿イングランド</option>
                                    </select>
                                    <button type="submit">選択</button>
                                </form>
                            </div>
                            <div class="gamegroup">
                                <form action="" method="post">
                                    <h3>GroupE</h3>
                                    <select name="date">
                                        <option value="ドイツ🇩🇪 vs 🇯🇵日本 2101">第１節　ドイツ🇩🇪vs🇯🇵日本</option>
                                        <option value="コスタリカ🇨🇷 vs 🇪🇸スペイン 2102">第１節　コスタリカ🇨🇷vs🇪🇸スペイン</option>
                                        <option value="日本🇯🇵 vs 🇨🇷コスタリカ 2103">第２節　日本🇯🇵vs🇨🇷コスタリカ</option>
                                        <option value="スペイン🇪🇸 vs 🇩🇪ドイツ 2104">第２節　スペイン🇪🇸vs🇩🇪ドイツ</option>
                                        <option value="日本🇯🇵 vs 🇪🇸スペイン 2105">第３節　日本🇯🇵vs🇪🇸スペイン</option>
                                        <option value="コスタリカ🇨🇷 vs 🇩🇪ドイツ 2106">第３節　コスタリカ🇨🇷vs🇩🇪sドイツ</option>
                                    </select>
                                    <button type="submit">選択</button>
                                </form>
                            </div>

                            <div class="gamegroup">
                                <form action="" method="post">
                                    <h3>GroupH</h3>
                                    <select name="date">
                                        <option value="ウルグアイ🇺🇾 vs 🇰🇷韓国">第１節　ウルグアイ🇺🇾vs🇰🇷韓国</option>
                                        <option value="ポルトガル🇵🇹 vs 🇬🇭ガーナ">第１節　ポルトガル🇵🇹vs🇬🇭ガーナ</option>
                                        <option value="韓国🇰🇷 vs 🇬🇭ガーナ">第２節　韓国🇰🇷vs🇬🇭ガーナ</option>
                                        <option value="ポルトガル🇵🇹　vs 🇺🇾ウルグアイ">第２節　ポルトガル🇵🇹vs🇺🇾ウルグアイ</option>
                                        <option value="韓国🇰🇷 vs 🇵🇹ポルトガル">第３節　韓国🇰🇷vs🇵🇹ポルトガル</option>
                                        <option value="ガーナ🇬🇭 vs 🇺🇾ウルグアイ">第３節　ガーナ🇬🇭vs🇺🇾ウルグアイ</option>
                                    </select>
                                    <button type="submit">選択</button>
                                </form>
                            </div>




                        </div>

                        <div class="areatwo col-md-4 mt-3">
                            <div class="gamegroup">
                                <form action="" method="post">
                                    <h3>GroupC</h3>
                                    <select name="date">
                                        <option value="アルゼンチン🇦🇷 -サウジアラビア🇸🇦">第１節　アルゼンチン🇦🇷vs🇸🇦サウジアラビア</option>
                                        <option value="メキシコ-ポーランド">第１節　メキシコ🇲🇽vs🇵🇱ポーランド</option>
                                        <option value="ポーランド-サウジアラビア">第２節　ポーランド🇵🇱vs🇸🇦サウジアラビア</option>
                                        <option value="アルゼンチン-メキシコ">第２節　アルゼンチン🇦🇷vs🇲🇽メキシコ</option>
                                        <option value="サウジアラビア-メキシコ">第３節　サウジアラビア🇸🇦vs🇲🇽メキシコ</option>
                                        <option value="ポーランド-アルゼンチン">第３節　ポーランド🇵🇱vs🇦🇷アルゼンチン</option>
                                    </select>
                                    <button type="submit">選択</button>
                                </form>
                            </div>
                            <div class="gamegroup">
                                <form action="" method="post">
                                    <h3>GroupF</h3>
                                    <select name="date">
                                        <option value="モロッコ-クロアチア">第１節　モロッコ🇲🇦vs🇭🇷クロアチア</option>
                                        <option value="ベルギー-カナダ">第１節　ベルギー🇧🇪vs🇨🇦カナダ</option>
                                        <option value="ベルギー-モロッコ">第２節　ベルギー🇧🇪vs🇲🇦モロッコ</option>
                                        <option value="クロアチア-カナダ">第２節　クロアチア🇭🇷vs🇨🇦カナダ</option>
                                        <option value="クロアチア-ベルギー">第３節　クロアチア🇭🇷vs🇧🇪ベルギー</option>
                                        <option value="カナダ-モロッコ">第３節　カナダ🇨🇦vs🇲🇦モロッコ</option>
                                    </select>
                                    <button type="submit">選択</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js
            " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM
            " crossorigin="anonymous ">
                </script>
                <script src="../js/time.js"></script>

            </div>
        </div>
    </div>
</body>

</html>