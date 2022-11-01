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
    <title>Document</title>
    <link rel="stylesheet" href="../css/discussion.css">
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
                <p>ログイン中ユーザー</p>
                <?php echo $name ?>
                <br>
                <a href="./home.php">ホームに戻る</a>
            </div>
        </div>


        <!-- 討論する試合をユーザーが選択する -->
        <div class="selectlist">
            <div class="select">


                <div class="gamegroup">
                    <form action="./discussion.php" method="post">
                        <h3>GroupA</h3>
                        <select name="date">
                            <option value="カタール-エクアドル">カタール - エクアドル</option>
                            <option value="セネガル-オランダ">セネガル-オランダ</option>
                            <option value="カタール-セネガル">カタール-セネガル</option>
                            <option value="オランダ-エクアドル">オランダ-エクアドル</option>
                            <option value="エクアドル-セネガル">エクアドル-セネガル</option>
                            <option value="オランダ-エクアドル">オランダ-エクアドル</option>
                        </select>
                        <button type="submit">選択</button>
                    </form>
                </div>

                <div class="gamegroup">
                    <form action="" method="post">
                    <h3>GroupB</h3>
                        <select name="date">
                            <option value="イングランド-イラン">イングランド - イラン</option>
                            <option value="アメリカ-ウェールズ">アメリカ-ウェールズ</option>
                            <option value="ウェールズ-イラン">ウェールズ-イラン</option>
                            <option value="イングランド-アメリカ">イングランド-アメリカ</option>
                            <option value="ウェールズ-イングランド">ウェールズ-イングランド</option>
                            <option value="イラン-アメリカ">イラン-アメリカ</option>
                        </select>
                        <button type="submit">選択</button>
                    </form>
                </div>

                <div class="gamegroup">
                    <form action="" method="post">
                        <h3>GroupC</h3>
                        <select name="date">
                            <option value="アルゼンチン-サウジアラビア">アルゼンチン - サウジアラビア</option>
                            <option value="メキシコ-ポーランド">メキシコ　-　ポーランド</option>
                            <option value="ウェールズ-イラン">ウェールズ-イラン</option>
                            <option value="イングランド-アメリカ">イングランド-アメリカ</option>
                            <option value="ウェールズ-イングランド">ウェールズ-イングランド</option>
                            <option value="イラン-アメリカ">イラン-アメリカ</option>
                        </select>
                        <button type="submit">選択</button>
                    </form>
                </div>

                <div class="gamegroup">
                    <form action="" method="post">
                        <h3>GroupD</h3>
                        <select name="date">
                            <option value="デンマーク-チュニジア">デンマーク - チュニジア</option>
                            <option value="アメリカ-ウェールズ">アメリカ-ウェールズ</option>
                            <option value="ウェールズ-イラン">ウェールズ-イラン</option>
                            <option value="イングランド-アメリカ">イングランド-アメリカ</option>
                            <option value="ウェールズ-イングランド">ウェールズ-イングランド</option>
                            <option value="イラン-アメリカ">イラン-アメリカ</option>
                        </select>
                        <button type="submit">選択</button>
                    </form>
                </div>

                <div class="gamegroup">
                    <form action="" method="post">
                        <h3>GroupE</h3>
                        <select name="date">
                            <option value="ドイツ-日本">ドイツ - 日本</option>
                            <option value="コスタリカ-スペイン">コスタリカ-スペイン</option>
                            <option value="日本-コスタリカ">日本-コスタリカ</option>
                            <option value="スペイン-ドイツ">スペイン-ドイツ</option>
                            <option value="日本-スペイン">日本-スペイン</option>
                            <option value="コスタリカ-ドイツ">コスタリカ-ドイツ</option>
                        </select>
                        <button type="submit">選択</button>
                    </form>
                </div>


                <div class="gamegroup">
                    <form action="" method="post">
                        <h3>GroupF</h3>
                        <select name="date">
                            <option value="モロッコ-クロアチア">モロッコ - クロアチア</option>
                            <option value="ベルギー-カナダ">ベルギー　-　カナダ</option>
                            <option value="ウェールズ-イラン">ウェールズ-イラン</option>
                            <option value="イングランド-アメリカ">イングランド-アメリカ</option>
                            <option value="ウェールズ-イングランド">ウェールズ-イングランド</option>
                            <option value="イラン-アメリカ">イラン-アメリカ</option>
                        </select>
                        <button type="submit">選択</button>
                    </form>
                </div>

                <div class="gamegroup">
                    <form action="" method="post">
                        <h3>GroupG</h3>
                        <select name="date">
                            <option value="スイス-カメルーン">スイス - カメルーン</option>
                            <option value="コスタリカ-スペイン">コスタリカ-スペイン</option>
                            <option value="日本-コスタリカ">日本-コスタリカ</option>
                            <option value="スペイン-ドイツ">スペイン-ドイツ</option>
                            <option value="日本-スペイン">日本-スペイン</option>
                            <option value="コスタリカ-ドイツ">コスタリカ-ドイツ</option>
                        </select>
                        <button type="submit">選択</button>
                    </form>
                </div>


                <div class="gamegroup">
                    <form action="" method="post">
                        <h3>GroupH</h3>
                        <select name="date">
                            <option value="ウルグアイ-韓国">ウルグアイ - 韓国</option>
                            <option value="コスタリカ-スペイン">コスタリカ-スペイン</option>
                            <option value="日本-コスタリカ">日本-コスタリカ</option>
                            <option value="スペイン-ドイツ">スペイン-ドイツ</option>
                            <option value="日本-スペイン">日本-スペイン</option>
                            <option value="コスタリカ-ドイツ">コスタリカ-ドイツ</option>
                        </select>
                        <button type="submit">選択</button>
                    </form>
                </div>
            </div>
        </div>



    </div>
</body>
</html>