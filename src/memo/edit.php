<?php


require_once('dbc.php');

$id = $_GET['id'];

$pdo = dbConnect();

$sql = 'SELECT * FROM pages WHERE id = :id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id',(int)$id, PDO::PARAM_INT);
$statement->execute();
$pages_list = $statement->fetch(PDO::FETCH_ASSOC);

?>





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
<body>
    <div class="row justify-content-center">
        <form action="index_update.php" method="post">
            <input type="hidden" name="id" value=<?php echo $pages_list['id'] ?>>
            <div class="form-group">
                <label>編集</label>
            </div>
            <div class="form-group">
                <label>title</label>
                <input type="text" name="title" class="form-control" value=<?php echo $pages_list['title']?>>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="content" class="form-control" value=<?php echo $pages_list['content']?>>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-primary" name="sava">更新</button>
            </div>
        </form>
    </div>
</body>
</body>
</html>
