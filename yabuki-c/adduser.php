
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>新規登録</title>
           </head>
    <body>
        <div>
<?php

# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
session_start();
    require_once 'database_conf.php';
    require_once 'h.php';
if (isset($_SESSION['example1'],$_POST['example2'], $_POST['example3'])) {
    try {
        $db = new PDO($dsn, $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = 'INSERT INTO users (userid,name,password) VALUES (:userid,:name,:password)';
        $prepare = $db->prepare($sql);
        $prepare->bindValue(':userid', $_SESSION['example1'], PDO::PARAM_STR);
        $prepare->bindValue(':name', $_POST['example2'], PDO::PARAM_STR);
        $prepare->bindValue(':password', $_POST['example3'], PDO::PARAM_STR);
        $prepare->execute();
        $id = $db->lastInsertId();
        
       
         header('Location:tourokugo.php');

    } catch (PDOException $e) {
        echo 'エラーが発生しました。内容: ' . h($e->getMessage());
    }
}
?>
        </div>
    </body>
</html>
