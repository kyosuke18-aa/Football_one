<?php

$title = '若くして、W杯優勝を経験した選手はだれ？';

$question = array(); //この変数は配列ですよという宣言
$question = array('ルカ・モドリッチ', 'キリアン・エンバペ', 'ネイマール', '長友佑都'); //4択の選択肢を設定

$answer = $question[0]; //正解の問題を設定

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>簡易クイズプログラム</title>
</head>

<body>

    <h2><?php echo $title ?></h2>
    <form method="POST" action="answer.php">
        <?php foreach ($question as $value) { ?>
            <input type="radio" name="question" value="<?php echo $value; ?>" /> <?php echo $value; ?><br>
        <?php } ?>
        <input type="hidden" name="answer" value="<?php echo $answer ?>">
        <input type="submit" value="回答する">
    </form>

</body>

</html>