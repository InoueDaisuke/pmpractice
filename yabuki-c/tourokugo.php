<?php
require_once 'h.php';
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" contednt="width=device-width,initial-scale=1.0">
        <title>登録完了</title>
    </head>
    <body>
        <div>
              <CENTER>
        <p><img src="tt.jpg" alt="title"></p>
                    <p>ID <?php 
                    echo h($_SESSION['example1']);?> <br>
                    これがあなたのIDです。忘れずにメモして置いてください<br>
              
                   </p>
    <form action="login.php" method="post">
            <BUTTON type="submit"/><IMG src="pp.jpg"></nobr></BUTTON></form>
        </div>
    </body>
</html>
