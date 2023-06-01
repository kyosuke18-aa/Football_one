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

// db接続
$pdo = connect();



if (isset($_POST["groupA"])) {
    $group = filter_input(INPUT_POST, "groupA");
    $one = $_POST["first"];
    $two = $_POST["second"];


    $sql  = 'INSERT INTO group_A(GroupA, user_id, first, second) VALUES(:GroupA, :user_id, :first, :second)';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":GroupA", $group);
    $stmt->bindParam(":user_id", $name);
    $stmt->bindParam(":first", $one[0]);
    $stmt->bindParam(":second", $two[0]);
    $stmt->execute();

    header("location: ./yview.php");
    return;
}

if (isset($_POST["groupB"])) {
    $group = filter_input(INPUT_POST, "groupB");
    $one = $_POST["first"];
    $two = $_POST["second"];


    $sql  = 'INSERT INTO group_B(GroupB, user_id, first, second) VALUES(:GroupB, :user_id, :first, :second)';
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":GroupB", $group);
    $stmt->bindParam(":user_id", $name);
    $stmt->bindParam(":first", $one[0]);
    $stmt->bindParam(":second", $two[0]);
    $stmt->execute();

    header("location: ./yview.php");
    return;
}



if (isset($_POST["groupC"])) {
    $group = filter_input(INPUT_POST, "groupC");
    $one = $_POST["first"];
    $two = $_POST["second"];


    $sql  = 'INSERT INTO group_C(GroupC, user_id, first, second) VALUES(:GroupC, :user_id, :first, :second)';
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":GroupC", $group);
    $stmt->bindParam(":user_id", $name);
    $stmt->bindParam(":first", $one[0]);
    $stmt->bindParam(":second", $two[0]);
    $stmt->execute();

    header("location: ./yview.php");
    return;
}


if (isset($_POST["groupD"])) {
    $group = filter_input(INPUT_POST, "groupD");
    $one = $_POST["first"];
    $two = $_POST["second"];


    $sql  = 'INSERT INTO group_D(GroupD, user_id, first, second) VALUES(:GroupD, :user_id, :first, :second)';
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":GroupD", $group);
    $stmt->bindParam(":user_id", $name);
    $stmt->bindParam(":first", $one[0]);
    $stmt->bindParam(":second", $two[0]);
    $stmt->execute();

    header("location: ./yview.php");
    return;
}

if (isset($_POST["groupE"])) {
    $group = filter_input(INPUT_POST, "groupE");
    $one = $_POST["first"];
    $two = $_POST["second"];


    $sql  = 'INSERT INTO group_E(GroupE, user_id, first, second) VALUES(:GroupE, :user_id, :first, :second)';
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":GroupE", $group);
    $stmt->bindParam(":user_id", $name);
    $stmt->bindParam(":first", $one[0]);
    $stmt->bindParam(":second", $two[0]);
    $stmt->execute();

    header("location: ./yview.php");
    return;
}

if (isset($_POST["groupF"])) {
    $group = filter_input(INPUT_POST, "groupF");
    $one = $_POST["first"];
    $two = $_POST["second"];


    $sql  = 'INSERT INTO group_F(GroupF, user_id, first, second) VALUES(:GroupF, :user_id, :first, :second)';
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":GroupF", $group);
    $stmt->bindParam(":user_id", $name);
    $stmt->bindParam(":first", $one[0]);
    $stmt->bindParam(":second", $two[0]);
    $stmt->execute();

    header("location: ./yview.php");
    return;
}

if (isset($_POST["groupG"])) {
    $group = filter_input(INPUT_POST, "groupG");
    $one = $_POST["first"];
    $two = $_POST["second"];


    $sql  = 'INSERT INTO group_G(GroupG, user_id, first, second) VALUES(:GroupG, :user_id, :first, :second)';
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":GroupG", $group);
    $stmt->bindParam(":user_id", $name);
    $stmt->bindParam(":first", $one[0]);
    $stmt->bindParam(":second", $two[0]);
    $stmt->execute();

    header("location: ./yview.php");
    return;
}

if (isset($_POST["groupH"])) {
    $group = filter_input(INPUT_POST, "groupH");
    $one = $_POST["first"];
    $two = $_POST["second"];


    $sql  = 'INSERT INTO group_H(GroupH, user_id, first, second) VALUES(:GroupH, :user_id, :first, :second)';
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":GroupH", $group);
    $stmt->bindParam(":user_id", $name);
    $stmt->bindParam(":first", $one[0]);
    $stmt->bindParam(":second", $two[0]);
    $stmt->execute();

    header("location: ./yview.php");
    return;
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トーナメント予想</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/yosen.css">
    <style>
        .teamall {
            display: flex;
        }

        .container {
            color: white;
        }

        body {
            background-color: #222426;
        }

        td {
            color: white;
        }

        table {
            border: 2px white solid;
        }
    </style>

</head>

<body>
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

    <div class="body">
        <div class="container">
            <div class="row">
                <p>　</p>
                <h3>ログイン中：<?php echo $name ?></h3>
                <p>・グループ内を突破する２チームを予想しましょう</p>
                <p>・1位通過予想は四角をクリック<input type="checkbox" name="" value="">：2位通過予想は丸をクリック<input type="radio" name="" value=""></p>

                <div class="col-md-3">
                    <form action="./yosen.php" method="POST">
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <input type="hidden" name="groupA" value="groupA">
                                    <th scope="col">1位</th>
                                    <th scope="col">2位</th>
                                    <th scope="col">GroupA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇶🇦カタール">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇶🇦カタール">　</th>
                                    <td draggable="true" class="one teama">カタール🇶🇦</td>
                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇪🇨エクアドル">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇪🇨エクアドル">　</th>
                                    <td draggable="true" class="two teama">エクアドル🇪🇨</td>
                                    <!-- <td></td> -->


                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇸🇳セネガル">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇸🇳セネガル">　</th>
                                    <td draggable="true" class="three teama">セネガル🇸🇳</td>
                                    <!-- <td></td> -->
                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇳🇱オランダ">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇳🇱オランダ">　</th>
                                    <td draggable="true" class="four teama">オランダ🇳🇱</td>
                                    <!-- <td></td> -->
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary rounded-pill">送信</button>

                    </form>
                </div>
                <!-- -------------------------------------------------- -->
                <div class="col-md-3">
                    <form action="./yosen.php" method="POST">
                        <!-- mt-5 py-3"> -->
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <input type="hidden" name="groupB" value="groupB">
                                    <th scope="col">1位</th>
                                    <th scope="col">2位</th>
                                    <th scope="col">GroupB</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🏴󠁧󠁢󠁥󠁮󠁧󠁿イングランド">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🏴󠁧󠁢󠁥󠁮󠁧󠁿イングランド">　</th>
                                    <td draggable="true" class="one teama">イングランド🏴󠁧󠁢󠁥󠁮󠁧󠁿</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇲🇽イラン">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇲🇽イラン">　</th>
                                    <td draggable="true" class="one teama">イラン🇮🇷</td>


                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇺🇸アメリカ">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇺🇸アメリカ">　</th>
                                    <td draggable="true" class="one teama">アメリカ🇺🇸</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🏴󠁧󠁢󠁷󠁬󠁳󠁿ウェールズ">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🏴󠁧󠁢󠁷󠁬󠁳󠁿ウェールズ">　</th>
                                    <td draggable="true" class="one teama">ウェールズ🏴󠁧󠁢󠁷󠁬󠁳󠁿</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary rounded-pill">送信</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="./yosen.php" method="POST">
                        <!-- mt-5 py-3"> -->
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <input type="hidden" name="groupC" value="groupC">
                                    <th scope="col">1位</th>
                                    <th scope="col">2位</th>
                                    <th scope="col">GroupC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇦🇷アルゼンチン">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇦🇷アルゼンチン">　</th>
                                    <td draggable="true" class="one teama">アルゼンチン🇦🇷</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇸🇦サウジアラビア">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇸🇦サウジアラビア">　</th>
                                    <td draggable="true" class="one teama">サウジアラビア🇸🇦</td>


                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇲🇽メキシコ">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇲🇽メキシコ">　</th>
                                    <td draggable="true" class="one teama">メキシコ🇲🇽</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇵🇱ポーランド">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇵🇱ポーランド">　</th>
                                    <td draggable="true" class="one teama">ポーランド🇲🇨</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary rounded-pill">送信</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="./yosen.php" method="POST">
                        <!-- mt-5 py-3"> -->
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <input type="hidden" name="groupD" value="groupD">
                                    <th scope="col">1位</th>
                                    <th scope="col">2位</th>
                                    <th scope="col">GroupD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇫🇷フランス">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇫🇷フランス">　</th>
                                    <td draggable="true" class="one teama">フランス🇫🇷</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇦🇺オーストラリア">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇦🇺オーストラリア">　</th>
                                    <td draggable="true" class="one teama">オーストラリア🇦🇺</td>


                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇩🇰デンマーク">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇩🇰デンマーク">　</th>
                                    <td draggable="true" class="one teama">デンマーク🇩🇰</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇹🇳チュニジア">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇹🇳チュニジア">　</th>
                                    <td draggable="true" class="one teama">チュニジア🇹🇳</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary rounded-pill">送信</button>
                    </form>
                </div>
                <!-- -------------------------------------------------- -->
                <div class="col-md-3">
                    <form action="./yosen.php" method="POST">
                        <!-- mt-5 py-3"> -->
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <input type="hidden" name="groupE" value="groupE">
                                    <th scope="col">1位</th>
                                    <th scope="col">2位</th>
                                    <th scope="col">GroupE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇪🇸スペイン">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇪🇸スペイン">　</th>
                                    <td draggable="true" class="one teama">スペイン🇪🇸</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇨🇷コスタリカ">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇨🇷コスタリカ">　</th>
                                    <td draggable="true" class="one teama">コスタリカ🇨🇷</td>


                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇩🇪ドイツ">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇩🇪ドイツ">　</th>
                                    <td draggable="true" class="one teama">ドイツ🇩🇪</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇯🇵日本">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇯🇵日本">　</th>
                                    <td draggable="true" class="one teama">日本🇯🇵</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary rounded-pill">送信</button>
                    </form>
                </div>

                <div class="col-md-3">
                    <form action="./yosen.php" method="POST">
                        <!-- mt-5 py-3"> -->
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <input type="hidden" name="groupF" value="groupF">
                                    <th scope="col">1位</th>
                                    <th scope="col">2位</th>
                                    <th scope="col">GroupF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇧🇪ベルギー">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇧🇪ベルギー">　</th>
                                    <td draggable="true" class="one teama">ベルギー🇧🇪</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇨🇦カナダ">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇨🇦カナダ">　</th>
                                    <td draggable="true" class="one teama">カナダ🇨🇦</td>


                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇲🇦モロッコ">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇲🇦モロッコ">　</th>
                                    <td draggable="true" class="one teama">モロッコ🇲🇦</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇭🇷クロアチア">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇭🇷クロアチア">　</th>
                                    <td draggable="true" class="one teama">クロアチア🇭🇷</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary rounded-pill">送信</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="./yosen.php" method="POST">
                        <!-- mt-5 py-3"> -->
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <input type="hidden" name="groupG" value="groupG">
                                    <th scope="col">1位</th>
                                    <th scope="col">2位</th>
                                    <th scope="col">GroupG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇧🇷ブラジル">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇧🇷ブラジル">　</th>
                                    <td draggable="true" class="one teama">ブラジル🇧🇷</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇷🇸セルビア">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇷🇸セルビア">　</th>
                                    <td draggable="true" class="one teama">セルビア🇷🇸</td>


                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇨🇭スイス">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇨🇭スイス">　</th>
                                    <td draggable="true" class="one teama">スイス🇨🇭</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇨🇲カメルーン">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇨🇲カメルーン">　</th>
                                    <td draggable="true" class="one teama">カメルーン🇨🇲</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary rounded-pill">送信</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="./yosen.php" method="POST">
                        <!-- mt-5 py-3"> -->
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <input type="hidden" name="groupH" value="groupH">
                                    <th scope="col">1位</th>
                                    <th scope="col">2位</th>
                                    <th scope="col">GroupH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇵🇹ポルトガル">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇵🇹ポルトガル">　</th>
                                    <td draggable="true" class="one teama">ポルトガル🇵🇹</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇬🇭ガーナ">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇬🇭ガーナ">　</th>
                                    <td draggable="true" class="one teama">ガーナ🇬🇭</td>


                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇺🇾ウルグアイ">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇺🇾ウルグアイ">　</th>
                                    <td draggable="true" class="one teama">ウルグアイ🇺🇾</td>

                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox" name="first[]" value="🇰🇷韓国">　</th>
                                    <th scope="row"><input type="radio" name="second[]" value="🇰🇷韓国">　</th>
                                    <td draggable="true" class="one teama">韓国🇰🇷</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary rounded-pill">送信</button>
                    </form>
                </div>
                <!-- -------------------------------------------------- -->
            </div>


            <div class="sideone">
                <p class="atag fs-6 mr-3"><a href="./home.php">ホームに戻る</a></p>
                <p class="atag fs-6 mr-3"><a href="./yview.php">トーナメント図を確認する</a></p>
            </div>

        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js
            " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM
            " crossorigin="anonymous ">
    </script>
    <script src="../js/yosen.js"></script>

</body>

</html>