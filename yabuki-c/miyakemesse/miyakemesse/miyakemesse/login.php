<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>ログイン画面</title>
    </head>
    <body>
         <h1>三宅メッセンジャー</h1>
       <?php
        session_start();
     echo    $_SESSION["error"]  ;

?>
        <form action="dologin.php" method="post">
            ユーザID：<input type="text" name="userid" /><br>
            パスワード：<input type="password" name="password" /></br>
            <input type="submit" value="ログイン" /></form>
         <form action="shinki.php" method="post">
            <input type="submit" value="新規登録" />
        </form>
    </body>
</html>