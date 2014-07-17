<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>ログイン画面</title>
    </head>
    <body>
        <CENTER>
        <p><img src="aa.jpg" alt="title"></p>
       <?php
       error_reporting(E_ALL & ~E_NOTICE);
        session_start();
     echo    $_SESSION["error"]  ;
     $_SESSION['example1']="";
     echo $_SESSION['example1']
        

?>
        <form action="dologin.php" method="post">
            ユーザID：<input type="text" name="userid" /><br>
            パスワード：<input type="password" name="password" /></br>
            <BUTTON type="submit"/><IMG src="bb.jpg"></BUTTON></form>
        <form action="shinkitouroku.php" method="post">
            <BUTTON type="submit"/><IMG src="cc.jpg"></BUTTON></form>
        </form>
        </CENTER>
    </body>
</html>