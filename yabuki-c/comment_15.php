<?php
header("HTTP/1.1 301 Moved Permanetly");
header("Location: commentform_15.php");
$comment = $_POST["comment"]; 
$name = $_POST["name"];
$shopid = $_POST["shopid"];


try {
$dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8',
  $_SERVER["C4SA_MYSQL_HOST"],
  $_SERVER["C4SA_MYSQL_DB"]);
$db = new PDO($dsn, $_SERVER["C4SA_MYSQL_USER"], $_SERVER["C4SA_MYSQL_PASSWORD"]);
} catch (PDOException $e) {
    echo "接続できませんでした" . $e->getMessage();
}

try {
    $sql = "INSERT INTO comments (comment, name, shopid) VALUES (:comment,:name, :shopid)";
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':comment', $comment);
    $prepare->bindValue(':name', $name);
    $prepare->bindValue(':shopid', 15);
    $prepare->execute();
} catch (PDOException $e) {
    echo "挿入失敗" . $e->getMessage();
    
}