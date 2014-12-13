<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>会話</title>
        <style>
            .he {color:red; margin-left: 100px;}
        </style>
    </head>
    <body>
        <form action="" method="post">
            <input type="test" name="message" size="50" />
            <input type="submit" value="送信" />
        </form>
        <?php
        //誰と会話しているのか
        session_start();
        $me = $_SESSION['username'];
        $he = $_SESSION['相手'];

        require_once 'database_conf.php';
        require_once 'h.php';
        $db = new PDO($dsn, $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //もしmessageが送られてきたらデータベースに保存する
        if (isset($_POST['message'])) {
            $sql = 'INSERT INTO talks (userFrom, userTo, body) VALUES (:from, :to, :body)';
            $prepare = $db->prepare($sql);
            $prepare->bindValue(':from', $me, PDO::PARAM_STR);
            $prepare->bindValue(':to', $he, PDO::PARAM_STR);
            $prepare->bindValue(':body', $_POST['message'], PDO::PARAM_STR);
            $prepare->execute();
        }

        //会話の表示
        $sql = 'select * from talks where (userFrom=:from and userTo=:to) or (userFrom=:to2 and userTo=:from2) order by time desc';
        $prepare = $db->prepare($sql);
        $prepare->bindValue(':from', $me, PDO::PARAM_STR);
        $prepare->bindValue(':from2', $me, PDO::PARAM_STR);
        $prepare->bindValue(':to', $he, PDO::PARAM_STR);
        $prepare->bindValue(':to2', $he, PDO::PARAM_STR);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

        echo '<dl>';
        foreach ($result as $talk) {
            //IDを名前に直す
            $sql2 = 'select name from users where id = :id';
            $prepare2 = $db->prepare($sql2);
            $prepare2->bindValue(':id', $talk['userFrom'], PDO::PARAM_STR);
            $prepare2->execute();
            $result2 = $prepare2->fetchAll(PDO::FETCH_ASSOC);
            $name = $result2[0]['name'];

            if ($talk['userFrom'] == $me) {
                echo '<dt>' . h($name) . '</dt>';
                echo '<dd>' . h($talk['body']) . '</dd>';
            } else {
                echo '<dt class="he">' . h($name) . '</dt>';
                echo '<dd>' . h($talk['body']) . '</dd>';
            }
        }
        echo '</dl>';
        ?>

    </body>
</html>        