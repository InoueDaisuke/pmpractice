<?php
require_once 'h.php';
session_start();
// ログイン状態のチェック
if (!isset($_SESSION["myid"])) {
  header("Location: logout.php");
  exit;
}

?>

<!doctype html>
<html>  
    <CENTER>
  <head>
    <meta charset="UTF-8">
          <p><img src="zz.jpg" alt="title"></p>
          <form action="tomodati.php" method="post">
            <BUTTON type="submit"/><IMG src="xx.jpg"></nobr></BUTTON></form>
  </head>

  <body>

            <li><a href="logout.php">ログアウト</a></li>

      </CENTER>
  </body>
</html>