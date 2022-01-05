<?php

try{
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    //データベース名,ユーザー名、パスワード
    $dsn ='mysql:dbname=contact_form;host=mysql;charset=utf8';
    $user='root';
    $password ='password';

    //MySQLのデータベースに接続
    $pdo = new PDO($dsn, $user, $password);
    //PDOのエラーレポートを表示
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //あらかじめMySOL内にテーブルとカラムを作成しておく必要がある
    $name= $_POST['title'];
    $email= $_POST['email'];
    $content = $_POST['content'];

    // INSERT文を変数に格納
    // あらかじめMySQL内に
    $sql ="INSERT INTO contacts (title, email, content) VALUES (:title, :email, :content)";
    $stmt = $pdo->prepare($sql);
    //$db = new PDO('mysql:dbname=contact_form;host=mysql;charset=utf8','root','password');
    $params = array(':title' => $name, ':email' => $email, ':content' => $content);
    $stmt->execute($params);


//     $db->exec(INSERT INTO contacts (title, email, content)VALUES("'.$title.'","'.$email.'","'.$content.'"));
}catch(PDOException $e){
    echo 'DB接続エラー:' . $e->getMessage();
}


?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>送信完了!!!</h2>
    <p><a href="index.php">送信画面へ</a></p>
    <p><a href="history.php">送信履歴をみる</a></p>
</body>
</html>
