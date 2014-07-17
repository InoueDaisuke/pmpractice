<?php
//認証を要求したいページの先頭に以下を記述します。
require_once '/xampp/htdocs/miyakemesse/loguin.php';
?>
<!DOCTYPE html>
<html long="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-wigth,initial-scale=1.0">
        <title>ログイン後</title>
    </head>
    <body>
        <div>
            <p><?php echo h($_SESSION['username']); ?>さんいらっしゃい！</p>
            <p>ログインした方のみが閲覧できます！</p>
            <p><a href="easyloginfrom_logout.php">ログアウトする</a>
        </div>
    </body>
    </html>