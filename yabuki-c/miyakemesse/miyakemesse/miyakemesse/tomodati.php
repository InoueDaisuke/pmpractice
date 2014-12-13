<?php
session_start();
// ログイン状態のチェック
if (!isset($_SESSION["userid"])) {
  header("Location: logout.php");
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>友達リスト</title>
  </head>
  <body>
      <p>友達リスト</p>
      <?php 
      
          require_once 'database_conf.php';
        require_once 'h.php';
        $db = new PDO($dsn, $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql= "SELECT * FROM friend where userid=:userid";
      $prepare=$db->prepare($sql);
      $prepare->bindValue(":userid", $_SESSION["userid"]);
      $prepare->execute();
$result=$prepare->fetchAll(PDO::FETCH_ASSOC);

                    echo '<ul>';
                    foreach ($result as $friend) {
                        echo '<li>' . h($friend['name']) . '</li>';
                    }
                    echo '</ul>';
                     
            ?>
      
     
      <li><a href="search.php">友達登録</a></li>
  <ul>
  <li><a href="main.php">ホーム</a></li>
  </ul>
  </body>
</html>