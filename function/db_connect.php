<?php
// pdo接続

function connect()
{
    // データベースに接続
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=All; charset=utf8mb4','root','root',[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);


        return $pdo;
    }catch(PDOException $e){
        echo '接続失敗です！' . $e->getMessage();
        exit();
    }
}