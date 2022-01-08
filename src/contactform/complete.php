<?php
    $errors = [];
    if($_SERVER["REQUEST_METHOD"] != "POST") $errors[] ="post送信になっていません!";

    $title = filter_input(INPUT_POST,'title');
    $email = filter_input(INPUT_POST,'email');
    $content = filter_input(INPUT_POST,'content');
    if (empty($title) || empty($email) || empty($content)) $errors[] ="「タイトル」「Email」「お問い合わせ」のどれかが記入されていません!";

    $db['user_name'] = "root";
    $db['password'] = "password";
    $pdo = new PDO("mysql:host=mysql; dbname=contact_form; charset=utf8", $db['user_name'], $db['password']);

    $sql = "INSERT INTO `contacts`(`id`, `title`, `email`, `content`) VALUES (0,:title,:email,:content)";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':content', $content, PDO::PARAM_STR);
    $statement->execute();

    if(empty($errors)) {
        $message = '送信完了！！！';
        $links = '
            <a href="./index.php">
                <p>送信画面へ</p>
            </a>
            <a href="./history.php">
                <p>送信履歴をみる</p>
            </a>';
    } else{
        $links = '
        <a href="./index.php">
            <p>送信画面へ</p>
        </a>
        ';
    }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>送信完了画面</title>
</head>

<body>
    <div class="container">
        <?php if (!empty($errors)) : ?>
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error . "\n"; ?></p>
            <?php endforeach; ?>
            <?php echo $links; ?>
        <?php endif; ?>

        <?php if (empty($errors)) : ?>
            <?php
            echo '<h2>' . $message . '</h2>';
            echo $links;
            ?>
        <?php endif; ?>
    </div>
</body>

</html>

<!-- try {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    //データベース名,ユーザー名、パスワード
    $dsn = 'mysql:dbname=contact_form;host=mysql;charset=utf8';
    $user = 'root';
    $password = 'password';

    //MySQLのデータベースに接続
    $pdo = new PDO($dsn, $user, $password);
    //PDOのエラーレポートを表示
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //あらかじめMySOL内にテーブルとカラムを作成しておく必要がある
    $name = $_POST['title'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    // INSERT文を変数に格納
    // あらかじめMySQL内に
    $sql =
        'INSERT INTO contacts (title, email, content) VALUES (:title, :email, :content)';
    $stmt = $pdo->prepare($sql);
    //$db = new PDO('mysql:dbname=contact_form;host=mysql;charset=utf8','root','password');
    $params = [':title' => $name, ':email' => $email, ':content' => $content];
    $stmt->execute($params);

    //     $db->exec(INSERT INTO contacts (title, email, content)VALUES("'.$title.'","'.$email.'","'.$content.'"));
} catch (PDOException $e) {
    echo 'DB接続エラー:' . $e->getMessage();
} ?> -->



<!-- <!DOCTYPE html>
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
</html> -->
