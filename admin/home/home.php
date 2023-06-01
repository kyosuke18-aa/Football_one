<?php
session_start();

require("../../function/db_connect.php");


// ①ウェブ管理者が試合結果を手打ちで入力
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = filter_input(INPUT_POST, "date");


    $_SESSION["name"] = $name;
    $_SESSION["date"] = $date;

    header("location: ./game.php");
    return;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ページ</title>
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
    <h1>対戦カードの試合結果を打ち込みます</h1>

    <div class="form_all">

        <form action="./home.php" method="post">
            <h3>GroupA</h3>
            <select name="date">
                <option value="カタール-エクアドル">第１節　カタール - エクアドル</option>
                <option value="セネガル-オランダ">第１節　セネガル-オランダ</option>
                <option value="カタール-セネガル">第２節　カタール-セネガル</option>
                <option value="オランダ-エクアドル">第２節　オランダ-エクアドル</option>
                <option value="オランダ-カタール">第３節　オランダ-カタール</option>
                <option value="エクアドル-セネガル">第３節　エクアドル-セネガル</option>
            </select>
            <button type="submit">選択</button>
        </form>


        <form action="" method="post">
            <h3>GroupB</h3>
            <select name="date">
                <option value="イングランド-イラン">第１節　イングランド - イラン</option>
                <option value="アメリカ-ウェールズ">第１節　アメリカ-ウェールズ</option>
                <option value="ウェールズ-イラン">第２節　ウェールズ-イラン</option>
                <option value="イングランド-アメリカ">第２節　イングランド-アメリカ</option>
                <option value="イラン-アメリカ">第３節　イラン-アメリカ</option>
                <option value="ウェールズ-イングランド">第３節　ウェールズ-イングランド</option>
            </select>
            <button type="submit">選択</button>
        </form>

        <form action="" method="post">
            <h3>GroupC</h3>
            <select name="date">
                <option value="アルゼンチン-サウジアラビア">第１節　アルゼンチン - サウジアラビア</option>
                <option value="メキシコ-ポーランド">第１節　メキシコ　-　ポーランド</option>
                <option value="ポーランド-サウジアラビア">第２節　ポーランド-サウジアラビア</option>
                <option value="アルゼンチン-メキシコ">第２節　アルゼンチン-メキシコ</option>
                <option value="サウジアラビア-メキシコ">第３節　サウジアラビア-メキシコ</option>
                <option value="ポーランド-アルゼンチン">第３節　ポーランド-アルゼンチン</option>
            </select>
            <button type="submit">選択</button>
        </form>

        <form action="" method="post">
            <h3>GroupD</h3>
            <select name="date">
                <option value="デンマーク-チュニジア">第１節　デンマーク - チュニジア</option>
                <option value="フランス-オーストラリア">第１節　フランス-オーストラリア</option>
                <option value="チュニジア-オーストラリア">第２節　チュニジア-オーストラリア</option>
                <option value="フランス-デンマーク">第２節　フランス-デンマーク</option>
                <option value="チュニジア-フランス">第３節　チュニジア-フランス</option>
                <option value="オーストラリア-デンマーク">第３節　オーストラリア-デンマーク</option>
            </select>
            <button type="submit">選択</button>
        </form>

        <form action="" method="post">
            <h3>GroupE</h3>
            <select name="date">
                <option value="ドイツ-日本">第１節　ドイツ - 日本</option>
                <option value="コスタリカ-スペイン">第１節　コスタリカ-スペイン</option>
                <option value="日本-コスタリカ">第２節　日本-コスタリカ</option>
                <option value="スペイン-ドイツ">第２節　スペイン-ドイツ</option>
                <option value="日本-スペイン">第３節　日本-スペイン</option>
                <option value="コスタリカ-ドイツ">第３節　コスタリカ-ドイツ</option>
            </select>
            <button type="submit">選択</button>
        </form>

        <form action="" method="post">
            <h3>GroupF</h3>
            <select name="date">
                <option value="モロッコ-クロアチア">第１節　モロッコ - クロアチア</option>
                <option value="ベルギー-カナダ">第１節　ベルギー　-　カナダ</option>
                <option value="ベルギー-モロッコ">第２節　ベルギー-モロッコ</option>
                <option value="クロアチア-カナダ">第２節　クロアチア-カナダ</option>
                <option value="クロアチア-ベルギー">第３節　クロアチア-ベルギー</option>
                <option value="カナダ-モロッコ">第３節　カナダ-モロッコ</option>
            </select>
            <button type="submit">選択</button>
        </form>

        <form action="" method="post">
            <h3>GroupG</h3>
            <select name="date">
                <option value="スイス-カメルーン">第１節　スイス - カメルーン</option>
                <option value="ブラジル-セルビア">第１節　ブラジル-セルビア</option>
                <option value="カメルーン-セルビア">第２節　カメルーン-セルビア</option>
                <option value="ブラジル-スイス">第２節　ブラジル-スイス</option>
                <option value="カメルーン-ブラジル">第３節　カメルーン-ブラジル</option>
                <option value="セルビア-スイス">第３節　セルビア-スイス</option>
            </select>
            <button type="submit">選択</button>
        </form>

        <form action="" method="post">
            <h3>GroupH</h3>
            <select name="date">
                <option value="ウルグアイ-韓国">第１節　ウルグアイ - 韓国</option>
                <option value="ポルトガル-ガーナ">第１節　ポルトガル-ガーナ</option>
                <option value="韓国-ガーナ">第２節　韓国-ガーナ</option>
                <option value="ポルトガル-ウルグアイ">第２節　ポルトガル-ウルグアイ</option>
                <option value="韓国-ポルトガル">第３節　韓国-ポルトガル</option>
                <option value="ガーナ-ウルグアイ">第３節　ガーナ-ウルグアイ</option>
            </select>
            <button type="submit">選択</button>
        </form>


    </div>
    <a href="../../userRoute/login/login_form.php">ログイン</a>
    <a href="./comparison.php">確認</a>
    <a href="https://www.google.com/search?q=W%E6%9D%AF+%E6%97%A5%E7%A8%8B&o
            q=W%E6%9D%AF%E3%80%80%E6%97%A5%E7%A8%8B&aqs=chrome..69i57j69i61l2.3872j0j15
            &sourceid=chrome&ie=UTF-8#sie=lg;/m/0fp_8fm;2;/m/030q7;mt;fp;1;;;">試合成績確認</a>


    <p>① 管理者が打ち込みたい試合を選択</p>
    <p>② dateカラムに一致する列のresultデータを更新</p>
    <p>③ sql文でscore,resultが一致するか検索</p>
    <p>④ 一致列のpointカラムを更新する　True　= 10pt</p>
    <p>⑤　False = 3pt　更新する</p>
</body>

</html>