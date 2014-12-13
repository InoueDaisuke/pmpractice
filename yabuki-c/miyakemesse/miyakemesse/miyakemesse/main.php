<?php
session_start();
// ログイン状態のチェック
if (!isset($_SESSION["userid"])) {
  header("Location: logout.php");
  exit;
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ホーム</title>
  </head>
  <body>
      <p>ホーム</p>
  <ul>
  <li><a href="tomodati.php">友達リスト</a></li>
  </ul>
      <ul>
            <li><a href="logout.php">ログアウト</a></li>
        </ul>
  </body>
</html>