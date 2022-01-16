<?php

function dbConnect(){

    $db['user_name'] = "root";
    $db['password'] = "password";

    try{
        $pdo = new PDO("mysql:host=mysql; dbname=memo; charset=utf8", $db['user_name'], $db['password'],[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    } catch(PDOException $e){
        echo '接続失敗'.$e->getMessage();
        exit();
    };

    return $pdo;
}





?>
