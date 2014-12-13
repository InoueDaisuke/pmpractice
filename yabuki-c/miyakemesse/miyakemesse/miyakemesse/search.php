<?php
session_start();
// ログイン状態のチェック
if (!isset($_SESSION["userid"])) {
  header("Location: logout.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>友だち追加</title>
    </head>
    <body>
        <h1>友だち追加</h1>
        <p>友達のIDと名前を入力してください</p>
        <div>
            <?php
            # h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
                require_once 'database_conf.php';
                require_once 'h.php';
            if (isset($_GET['id'], $_GET['pass'])) {


                
                try {
                    $db = new PDO($dsn, $dbUser, $dbPass);
                    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $sql = 'SELECT * FROM users WHERE userid = :word AND password = :word2';
                    $prepare = $db->prepare($sql);
                    $prepare->bindValue(':word', '%' . $_GET['id'] . '%', PDO::PARAM_STR);
                    $prepare->bindValue(':word2', '%' . $_GET['pass'] . '%', PDO::PARAM_STR);
                    $prepare->execute();
                    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);






                    echo '<p>結果</p>';
                    echo '<ul>';
                    foreach ($result as $friend) {
                        echo '<li>' . h($friend['name']) . '</li>';
                    }
                    echo '</ul>';
                } catch (PDOException $e) {
                    echo 'エラーが発生しました。内容: ' . h($e->getMessage());
                }
            }
            ?>
            <form method="get" action="search.php">
                <p>ID
                    <input type="text" name="id" value="" pattern="[A-Za-z0-9]{8}" required autofocus></p>
                <p>パスワード
                    <input type="text" name="pass" value=""  pattern="[A-Za-z0-9]{4,16}" required></p>

                <p><input type="submit" value="追加"  ></p>
            </form>
        </div>
    </body>
</html>
