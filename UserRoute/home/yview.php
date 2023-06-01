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


// groupAを予想しているデータを取得
$sql = "SELECT user_id,GroupA,first,second FROM group_A WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $name);
$stmt->execute();
$resA = $stmt->fetch();
if ($resA) {
    $Af = $resA["first"];
    $As = $resA["second"];
}



// groupBデータ
$sql = "SELECT user_id,groupB,first,second FROM group_B WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $name);
$stmt->execute();
$resB = $stmt->fetch();
if ($resB) {
    $Bf = $resB["first"];
    $Bs = $resB["second"];
}



// groupC
$sql = "SELECT user_id,groupC,first,second FROM group_C WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $name);
$stmt->execute();
$resC = $stmt->fetch();

if ($resC) {
    $Cf = $resC["first"];
    $Cs = $resC["second"];
}



// groupD
$sql = "SELECT user_id,groupD,first,second FROM group_D WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $name);
$stmt->execute();
$resd = $stmt->fetch();

if ($resd) {
    $df = $resd["first"];
    $ds = $resd["second"];
}


// groupE
$sql = "SELECT user_id,groupE,first,second FROM group_E WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $name);
$stmt->execute();
$rese = $stmt->fetch();

if ($rese) {
    $ef = $rese["first"];
    $es = $rese["second"];
}


// groupF
$sql = "SELECT user_id,groupF,first,second FROM group_F WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $name);
$stmt->execute();
$resf = $stmt->fetch();

if ($resf) {
    $ff = $resf["first"];
    $fs = $resf["second"];
}


// groupG
$sql = "SELECT user_id,groupG,first,second FROM group_G WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $name);
$stmt->execute();
$resg = $stmt->fetch();

if ($resg) {
    $gf = $resg["first"];
    $gs = $resg["second"];
}


// groupH
$sql = "SELECT user_id,groupH,first,second FROM group_H WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $name);
$stmt->execute();
$resh = $stmt->fetch();

if ($resh) {
    $hf = $resh["first"];
    $hs = $resh["second"];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/yosen.css">
    <style>
        .teamall {
            display: flex;
            color: white;
        }

        body {
            background: linear-gradient(60deg, #555555, #444444);
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
            <div class="teamall">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <table width="530" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" align="right" width="130" valign="middle">A1位　<?php
                                                                                                            if ($resA) {
                                                                                                                echo $Af;
                                                                                                            }
                                                                                                            ?></td>
                                            <td width="160">　</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="border-top-width : thin;border-right-width : thin;border-top-style : solid;border-right-style : solid;border-top-color : black;border-right-color : black;" width="158" align="center">　</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" align="right" width="50" valign="middle">B2位　<?php if ($resB) {
                                                                                                                echo $Bs;
                                                                                                            } ?></td>
                                            <td style="border-right-width : thin;border-bottom-width : thin;border-right-style : solid;border-bottom-style : solid;border-right-color : black;border-bottom-color : black;" width="158" align="center">
                                                　
                                            </td>
                                            <td style="border-top-width : thin;border-top-style : solid;border-top-color : black; border-right-width: thin; border-right-style:solid; border-right-color: black;" align="center">
                                                　
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="158">　</td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black">　</td>
                                            <td style="border-bottom-width: thin; border-bottom-style: solid; border-bottom-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle">C1位　<?php if ($resC) {
                                                                                                                echo $Cf;
                                                                                                            } ?></td>
                                            <td width="158">　</td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black">　</td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="border-top-width : thin;border-right-width : thin;border-top-style : solid;border-right-style : solid;border-top-color : black;border-right-color : black;" width="158" align="center">　</td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black">　</td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle">D2位　<?php if ($resd) {
                                                                                                                echo $ds;
                                                                                                            } ?></td>
                                            <td style="border-right-width : thin;border-bottom-width : thin;border-right-style : solid;border-bottom-style : solid;border-right-color : black;border-bottom-color : black;" width="158" align="center">
                                                　
                                            </td>
                                            <td style="border-top-width: thin; border-top-style: solid; border-top-color : black;" align="center">
                                                　
                                            </td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="158">　</td>
                                            <td></td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black;">　</td>
                                            <td style="border-bottom-width: thin; border-bottom-style: solid; border-bottom-color: black;">　</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle">E1位　<?php if ($resf) {
                                                                                                                echo $ef;
                                                                                                            } ?></td>
                                            <td width="158">　</td>
                                            <td></td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="border-top-width : thin;border-right-width : thin;border-top-style : solid;border-right-style : solid;border-top-color : black;border-right-color : black;" width="158" align="center">　</td>
                                            <td></td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle">F2位　<?php if ($resf) {
                                                                                                                echo $fs;
                                                                                                            } ?></td>
                                            <td style="border-right-width : thin;border-bottom-width : thin;border-right-style : solid;border-bottom-style : solid;border-right-color : black;border-bottom-color : black;" width="158" align="center">
                                                　
                                            </td>
                                            <td style="border-top-width: thin; border-top-style: solid; border-top-color : black; border-right-style: solid; border-right-width: thin; border-right-color: black;" align="center">
                                                　
                                            </td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="158">　</td>
                                            <td style="border-right-style: solid; border-right-width: thin; border-right-color: black;">　</td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black; border-bottom-width: thin; border-bottom-style: solid; border-bottom-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle">G1位　<?php if ($resg) {
                                                                                                                echo $gf;
                                                                                                            } ?></td>
                                            <td width="158">　</td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black">　</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="border-top-width : thin;border-right-width : thin;border-top-style : solid;border-right-style : solid;border-top-color : black;border-right-color : black;" width="158" align="center">　</td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black">　</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle">H2位　<?php if ($resh) {
                                                                                                                echo $hs;
                                                                                                            } ?></td>
                                            <td style="border-right-width : thin;border-bottom-width : thin;border-right-style : solid;border-bottom-style : solid;border-right-color : black;border-bottom-color : black;" width="158" align="center">
                                                　
                                            </td>
                                            <td style="border-top-width: thin; border-top-style: solid; border-top-color : black;" align="center">
                                                　
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="158">　</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <table width="516" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle"></td>
                                            <td width="158">　</td>
                                            <td></td>
                                            <td></td>
                                            <td rowspan="2" align="left" valign="middle">B1位　<?php if ($resB) {
                                                                                                    echo $Bf;
                                                                                                } ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="158" align="center">　</td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black;"></td>
                                            <td style="border-top-width: thin; border-top-style: solid; border-top-color: black;"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" align="right" width="50" valign="middle"></td>
                                            <td width="158" align="center">
                                                　
                                            </td>
                                            <td style="border-top-width : thin;border-top-style : solid;border-top-color : black; border-right-width: thin; border-right-style:solid; border-right-color: black; border-left-width: thin; border-left-style: solid; border-left-color: black;" align="center">
                                                　
                                            </td>
                                            <td style="border-bottom-width: thin; border-bottom-style: solid; border-bottom-color: black;"></td>
                                            <td rowspan="2" align="left" valign="middle">A2位　<?php if ($resA) {
                                                                                                    echo $As;
                                                                                                } ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="158">　</td>
                                            <td style="border-left-width: thin; border-left-style: solid; border-left-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle"></td>
                                            <td width="158" style="border-left-width: thin; border-left-style: solid; border-left-color: black; border-top-width: thin; border-top-style: solid; border-top-color: black;">　</td>
                                            <td style="border-left-width: thin; border-left-style: solid; border-left-color: black;">　</td>
                                            <td>　</td>
                                            <td rowspan="2" align="left" valign="middle">D1位　<?php if ($resd) {
                                                                                                    echo $df;
                                                                                                } ?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="border-left-width: thin; border-left-style: solid; border-left-color: black;" width="158" align="center">　</td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black; border-left-width: thin; border-left-style: solid; border-left-color: black;">　</td>
                                            <td style="border-top-width: thin; border-top-style: solid; border-top-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle" style="border-bottom-width: thin; border-bottom-style: solid; border-bottom-color: black;"></td>
                                            <td style="border-left-width: thin; border-left-style: solid; border-left-color: black;" width="158" align="center">
                                                　
                                            </td>
                                            <td style="border-top-width: thin; border-top-style: solid; border-top-color : black; border-right-width: thin; border-right-style: solid; border-right-color: black;" align="center">
                                                　
                                            </td>
                                            <td style="border-bottom-width: thin; border-bottom-style: solid; border-bottom-color: black;">　</td>
                                            <td rowspan="2" align="left" valign="middle">C2位　<?php if ($resC) {
                                                                                                    echo $Cs;
                                                                                                } ?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="158" style="border-left-width: thin; border-left-style: solid; border-left-color: black;">　</td>
                                            <td></td>
                                            <td>　</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle"></td>
                                            <td width="158" style="border-left-width: thin; border-left-style: solid; border-left-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                            <td rowspan="2" align="left" valign="middle">F1位　<?php if ($resf) {
                                                                                                    echo $ff;
                                                                                                } ?></td>

                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="border-left-width: thin; border-left-style: solid; border-left-color: black;" width="158" align="center">　</td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black;"></td>
                                            <td style="border-top-width: thin; border-top-style: solid; border-top-color: black;"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle"></td>
                                            <td style="border-left-width: thin; border-left-style: solid; border-left-color: black;" width="158" align="center">
                                                　
                                            </td>
                                            <td style="border-top-width: thin; border-top-style: solid; border-top-color : black; border-right-style: solid; border-right-width: thin; border-right-color: black; border-left-width: thin; border-left-style: solid; border-left-color: black;" align="center">
                                                　
                                            </td>
                                            <td style="border-bottom-width: thin; border-bottom-style: solid; border-bottom-color: black;">　</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="158" style="border-left-width: thin; border-left-style: solid; border-left-color: black;  border-bottom-width: thin; border-bottom-style: solid; border-bottom-color: black;">　</td>
                                            <td style="border-left-width: thin; border-left-style: solid; border-left-color: black;">　</td>
                                            <td></td>
                                            <td rowspan="2" align="left" valign="middle">E2位　<?php if ($rese) {
                                                                                                    echo $es;
                                                                                                } ?></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle">
                                            </td>
                                            <td width="158">　</td>
                                            <td style="border-left-width: thin; border-left-style: solid; border-left-color: black;">　</td>
                                            <td></td>
                                            <td rowspan="2" align="left" valign="middle">H1位　<?php if ($resh) {
                                                                                                    echo $hf;
                                                                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td style="border-right-width: thin; border-right-style: solid; border-right-color: black; border-left-width: thin; border-left-style: solid; border-left-color: black;">　</td>
                                            <td style="border-top-width: thin; border-top-style: solid; border-top-color: black;"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" align="right" width="107" valign="middle"></td>
                                            <td width="158" align="center">
                                                　
                                            </td>
                                            <td style="border-top-width: thin; border-top-style: solid; border-top-color : black; border-right-width: thin; border-right-style: solid; border-right-color: black;" align="center">
                                                　
                                            </td>
                                            <td style="border-bottom-width: thin; border-bottom-style: solid; border-bottom-color: black;"></td>
                                            <td rowspan="2" align="left" valign="middle">G2位　<?php if ($resg) {
                                                                                                    echo $gs;
                                                                                                } ?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="158">　</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div>
                <a href="./yosen.php">トーナメント予想に戻る</a>
            </div>

        </div>

    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js
            " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM
            " crossorigin="anonymous ">
    </script>
    <script src="./main.js"></script>

</body>

</html>