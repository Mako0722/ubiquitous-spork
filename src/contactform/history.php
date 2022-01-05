<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>送信履歴</h1>
<?php
    $dsn ='mysql:dbname=contact_form;host=mysql;charset=utf8';
    $user='root';
    $password ='password';

    //MySQLのデータベースに接続
    $pdo = new PDO($dsn, $user, $password);

    // $user_id = 3;
    // $sql ="SELECT * FROM contacts WHERE id IN(".$user_id.")";
    // $result_rows = $pdo->query($sql);

    $result_list = $pdo->query('SELECT * FROM contacts ORDER BY title');
?>

<?php foreach ( $result_list as $row): ?>
    <h2><?="{$row['title']}" ?></h2>
    <?= "{$row['content']}"?>
<?php endforeach; ?>

<p><a href="index.php">戻る</a></p>
</body>
</html>
