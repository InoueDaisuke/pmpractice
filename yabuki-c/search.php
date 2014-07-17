<?php
require_once 'h.php';
session_start();
// ログイン状態のチェック
if (!isset($_SESSION["myid"])) {
  header("Location: logout.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>友達追加</title>
    </head>
    <body>
  <CENTER>
        <p><img src="qq.jpg" alt="title"></p>
        <p>友達のIDと名前を入力してください</p>
        <div>
            <?php
            # h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
            require_once 'database_conf.php';
                require_once 'h.php';
            if (isset($_GET['id'], $_GET['name'])) {


                
                try {
                    $db = new PDO($dsn, $dbUser, $dbPass);
                    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    

                    $sql = 'SELECT  * FROM users WHERE userid LIKE :word AND name LIKE :word2';
                    $prepare = $db->prepare($sql);
                    $prepare->bindValue(':word', '%' . $_GET['id'] . '%', PDO::PARAM_STR);
                    $prepare->bindValue(':word2', '%' . $_GET['name'] . '%', PDO::PARAM_STR);
                    $prepare->execute();
                    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
                     foreach ($result as $friend) {
                      echo '<li>' . h($friend['name']) . '</li>';
                  $sql2 = 'INSERT INTO friend (friendid,myid) VALUES (:friendid,:myid)';
                   $prepare2 = $db->prepare($sql2);
                   $prepare2->bindValue(':friendid', $_GET['id'], PDO::PARAM_STR);
                   $prepare2->bindValue(':myid', $_SESSION['myid'], PDO::PARAM_STR);
                   $prepare2->execute();
                  $id = $db->lastInsertId();
                     }
                     } catch (PDOException $e) {
                    echo 'エラーが発生しました';
                }
            }
            ?>
            <form method="get" action="search.php">
                <p>ID
                    <input type="text" name="id" value="" pattern="[A-Za-z0-9]{8}" required autofocus></p>
                <p>名前
                    <input type="text" name="name" value="" required></p>

        
          
            <BUTTON type="submit"/><IMG src="ee.jpg"></BUTTON></form>
             
  <li><a href="main.php">ホーム</a></li>
  
        </div>
  </CENTER>
    </body>
</html>
