<?php

$title = filter_input(INPUT_POST, 'title');
$content = filter_input(INPUT_POST, 'content');
//if (empty($title) || empty($content)) $errors[] = "「タイトル」「メモの内容」のどれかが記入されていません！";

require_once('dbc.php');
$pdo = dbConnect();

if (empty($title)){
    exit('タイトルを入力してください');
}

if (mb_strlen($title) > 191){
    exit('タイトルは191文字以内にしてください');
}



if (empty($content)){
    exit('タイトルを入力してください');
}



    $sql = "INSERT INTO `pages`(`id`, `title`, `content`) VALUES (0,:title,:content)";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':content', $content, PDO::PARAM_STR);
    $statement->execute();


header('Location: index.php');





// $statement = $pdo->prepare('INSERT INTO memo SET memo=?, created_at=NOW()');
// $statement->execute(array($_POST['memo']));


?>
