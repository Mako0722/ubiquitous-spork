<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="row justify-content-center">
        <form action="toukou.php" method="post">
            <div class="form-group">
                <label>メモ登録</label>
            </div>
            <div class="form-group">
                <label>title</label>
                <input type="text" id="title" name="title" class="form-control"  placeholder="タイトル">
            </div>
            <div class="form-group">
                <label>本文</label>
                <input type="text" id="content" name="content" class="form-control" placeholder="本文">
            </div>
            <div class="form-group">
                <button type="submit" value="送信" class="btn-primary" name="button">送信</button>
            </div>
        </form>
    </div>
</body>
</html>
