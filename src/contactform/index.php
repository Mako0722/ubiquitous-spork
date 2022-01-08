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
        <table>
            <tr>
                <td>タイトル</td>
                <td><input name="title" cols="30" rows="10" placeholder="タイトル"></textarea></td>
                </tr>
            <tr>
                <td>Email</td>
                <td><input name="email" cols="30" rows="10" placeholder="Emailアドレス"></textarea></td>
            </tr>
            <tr>
                <td valign="top">お問い合わせ内容</td>
                <td><textarea name="content" cols="30" rows="10" placeholder="お問い合わせ内容（1000文字まで）お書きください"></textarea></td>
            </tr>
            <tr>
            <td></td>
            <td><button type="submit" name="button">送信</button></td>
            </tr>
        </table>
    </form>
        <!-- <label for="title">タイトル (必須)</label> -->
        <!-- <input type="text" id="title" name="title"  placeholder="タイトル"><br> -->

        <!-- <label for="email">Email (必須)</label>
        <input type="text" id="email" name="email" placeholder="Email アドレス"><br>

        <label for="content">お問い合わせ内容 (必須)</label>
        <textarea name="content" cols="19" rows="3" placeholder="お問い合わせ内容(1000文字まで)をお書きください"></textarea><br>
        <input type="submit" value="送信"> -->
</body>
</html>
