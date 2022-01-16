<?php

$db['user_name'] = 'root';
$db['password'] = 'password';

$pdo = new PDO(
    'mysql:host=mysql; dbname=memo; charset=utf8',
    $db['user_name'],
    $db['password']
);

$stmt = $pdo->prepare('DELETE FROM pages WHERE id = :id');

$stmt->execute([':id' => $_GET['id']]);
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>削除完了</title>
  </head>
  <body>
  <p>
      <a href="index.php">投稿一覧へ</a>
  </p>
  </body>
</html>
