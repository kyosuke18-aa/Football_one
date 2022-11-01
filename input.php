<?php

$arr = [];
$name = "hikaru";
$date = "ドイツ-日本";



if(isset($_POST)){
    $number = filter_input(INPUT_POST,"num");

    if (preg_match("/[0-9]{1}-[0-9]{1}/", $number)) {
        // echo "すべて半角数字である";
        $arr[] = $number;

        $pdo = new PDO('mysql:host=localhost;dbname=tests;','root','root',[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

        $sql = ("UPDATE football SET score = :score WHERE user_id = :user_id AND date = :date");
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":user_id",$name);
        $stmt->bindParam(":date",$date);
        $stmt->bindParam(":score",$number);
        $stmt->execute();


    } else {
        // echo "すべて半角数字ではない";
        $arr[] = "正しい入力をしてください。例)２−０";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h3>正規表現</h3>
    <?php echo $name ?>
    <?php echo $date ?>
        <h2>
            <?php foreach($arr as $row):?>
                    <?php if(isset($row)) :?>
                        <p><?php echo $row ?></p>
                    <?php endif;?>
            <?php endforeach; ?>
        </h2>


    <form action="./input.php" method="post">
        <input type="text" name="num">
        <button type="submit">送信</button>
    </form>
</body>
</html>