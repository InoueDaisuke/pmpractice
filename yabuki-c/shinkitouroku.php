<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>新規登録</title>
        
    </head>
    <body>
        <CENTER>
        <p><img src="gg.jpg" alt="title"></p>
        <div>
            <?php
            session_start();
            require_once'generateRandomString.php';
            $randomStr = generateRandomString(8);
            $_SESSION['example1']=$randomStr ;
            ?>
           
                <form method="post" action="adduser.php">
                <p>名前
                    <input type="text" name="example2" value=""  required autofocus></p>
                <p>パスワード
                    <input type="text" name="example3" value=""  pattern="[A-Za-z0-9]{4,16}" required></p>

            <BUTTON type="submit"/><IMG src="ii.jpg"></BUTTON></form>

            
        </div>
        </CENTER>
    </body>
</html>
