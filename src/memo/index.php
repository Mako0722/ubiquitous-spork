<?php

$db['user_name'] = "root";
$db['password'] = "password";
$pdo = new PDO("mysql:host=mysql; dbname=memo; charset=utf8", $db['user_name'], $db['password']);

// $sql = "INSERT INTO `pages`(`id`, `title`, `content`) VALUES (0,:title,:content)";

// $statement = $pdo->prepare($sql);
// $statement->bindValue(':title', $title, PDO::PARAM_STR);
// $statement->bindValue(':content', $content, PDO::PARAM_STR);
// $statement->execute();
$sql = 'SELECT * FROM pages';
$statement = $pdo->prepare($sql);
$statement->execute();
$pages_lists = $statement->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM pages";
if (!empty($_GET['searchWord'])) {
    $escapedKeyword = "";
    $searchWord = filter_input(INPUT_GET, 'searchWord', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sql .= " where title like :keyword";
    $pattern = '/%/';
    if (preg_match($pattern, $searchWord)) {
        $escapedKeyword = str_replace('%', '\%', $search);
        $searchKeyword = '%' . $escapedKeyword . '%';
    } else $searchKeyword = '%' . $searchWord . '%';
}

$statement = $pdo->prepare($sql);
if (!empty($_GET['searchWord'])) $statement->bindValue(':keyword', $searchKeyword, PDO::PARAM_STR);
$statement->execute();

//昇順に並び替えるSQL文
	$sql = "SELECT * FROM pages ORDER BY created_at";

// 	//降順が指定されているか判定
	if( isset($_POST["sort"]) && $_POST["sort"] == "desc"){
    		//降順に並び替えるSQL文に変更
    		$sql = $sql . " DESC";
    	}

    	$statement = $pdo->prepare($sql);
    	$statement->execute();
    $pages_lists = $statement->fetchAll(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sample.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <div>
        <form method="get" action="./index.php">
            <div>
                <input type="textarea" name="searchWord" placeholder="Search..." value="<?php echo $search ?? '' ?>">
                <button type="submit">検索</button>
            </div>
        </form>
        <h3>メモ一覧</h3>

    </div>
    <a href="./create.php">
        <p>メモ追加</p>
    </a>
</div>
<div class="row justify-content-center">
    <table class="table">
        <tr>
            <th>タイトル</th>
            <th>内容</th>
            <th>作成日時</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
    </table>
</div>
<?php
    foreach($pages_lists as $pages_list):?>
    <div class="row justify-content-center">
      <table class="table">
        <tr>
          <th><?php echo $pages_list['title'] ?></th>
          <th><?php echo $pages_list['content'] ?></th>
          <th><?php echo $pages_list['created_at'] ?></th>
          <th><a href="edit.php?id=<?php echo $pages_list['id'] ?>">編集</a></th>
          <th><a href="delete.php?id=<?php echo $pages_list['id'] ?>">削除</a></th>
        </tr>
      </table>
    </div>
<?php endforeach ?>


<form action="" method="post">

	<!--
	昇順を指定するラジオボタン
	-->
	<input type="radio" name="sort" value="asc"
<?php
	//降順に指定されていない時はチェックする
	if( !isset($_POST["sort"]) || $_POST["sort"] != "desc"){
		echo "checked";
	}
?> >昇順

	<!--
	降順を指定するラジオボタン
	-->
	<input type="radio" name="sort" value="desc"
<?php
	//降順に指定されている時はチェックする
	if( isset($_POST["sort"]) && $_POST["sort"] == "desc"){
		echo "checked";
	}
?> >降順

<input type="submit" value="並び替え">
</form>
</body>
</html>
