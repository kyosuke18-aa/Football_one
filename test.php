<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./test.css">
</head>

<body>
    <div class="body">
        <div class="group">
            <h2>グループステージ突破国 予想</h2>
            <hr>
            <p>GroupA　〜　GroupH　予選を突破する上位２チームを予想してください</p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">GroupA</th>
                    <th scope="col">上位2チームをチェクで選択（✅</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>オランダ</td>
                    <td><input type="checkbox" id="horns" name="horns"></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>セネガル</td>
                    <td><input type="checkbox" id="horns" name="horns"></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>カタール</td>
                    <td><input type="checkbox" id="horns" name="horns"></td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>エクアドル</td>
                    <td><input type="checkbox" id="horns" name="horns"></td>

                </tr>
            </tbody>
        </table>



        <div class="all">

            <div class="one">
                <p>左</p>
                <?php
                echo date('Y年m月d日 H:i:s', time());
                ?>
            </div>

            <div class="two">
                <p>右</p>
            </div>

        </div>
    </div>
</body>

</html>