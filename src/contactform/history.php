<?php
    $db['user_name'] = "root";
    $db['password'] = "password";
    $pdo = new PDO("mysql:host=mysql; dbname=contact_form; charset=utf8", $db['user_name'], $db['password']);

    $sql = "INSERT INTO `contacts`(`id`, `title`, `email`, `content`) VALUES (0,:title,:email,:content)";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>送信履歴</title>
</head>

<body>
    <div class="container">
        <h2>送信履歴</h2>
        <?php foreach ($contacts as $contact) : ?>
            <h3><?php echo $contact['title'] ?></h3>
            <p><?php echo $contact['content'] ?></p>
        <?php endforeach; ?>
        <a href="./index.php">戻る</a>
    </div>
</body>

</html>


<!-- <!DOCTYPE html>
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
    // $dsn ='mysql:dbname=contact_form;host=mysql;charset=utf8';
    // $user='root';
    // $password ='password';

    //MySQLのデータベースに接続
    // $pdo = new PDO($dsn, $user, $password);

    // $user_id = 3;
    // $sql ="SELECT * FROM contacts WHERE id IN(".$user_id.")";
    // $result_rows = $pdo->query($sql);

    // $result_list = $pdo->query('SELECT * FROM contacts ORDER BY title');
?>

<p><a href="index.php"></a></p>
</body>
</html> --> 
