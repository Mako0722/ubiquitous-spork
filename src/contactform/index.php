<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問合せフォーム</title>
</head>
<body>
    <h2>お問合せフォーム</h2>
    <p>以下のフォームからお問い合わせください</p>
    <form action="complete.php" method="post">
        <label for="title">タイトル (必須)</label>
        <input type="text" id="title" name="title"  placeholder="タイトル"><br>

        <label for="email">Email (必須)</label>
        <input type="text" id="email" name="email" placeholder="Email アドレス"><br>

        <label for="content">お問い合わせ内容 (必須)</label>
        <textarea name="content" cols="19" rows="3" placeholder="お問い合わせ内容(1000文字まで)をお書きください"></textarea><br>
        <input type="submit" value="送信">
    </form>
</body>
</html>
