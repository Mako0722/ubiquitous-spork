<?php

$db['user_name'] = "root";
$db['password'] = "password";

$pdo = new PDO("mysql:host=mysql; dbname=memo; charset=utf8", $db['user_name'], $db['password']);

$stmt = $pdo->prepare('UPDATE pages SET title = :title, content = :content WHERE id = :id');

$stmt->execute(array(':title' => $_POST['title'], ':content' => $_POST['content'], ':id' => $_POST['id']));

?>
<html>
  <head>
    <meta charset="utf-8">
    <title>更新完了</title>
  </head>
  <body>
  <p>
      <a href="index.php">投稿一覧へ</a>
  </p>
  </body>
</html>
