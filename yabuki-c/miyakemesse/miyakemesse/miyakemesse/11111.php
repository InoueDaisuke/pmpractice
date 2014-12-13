<?php
   
  // ログインボタンが押された場合      
  if (isset($_POST["login"])){
      require_once 'database_conf.php';
        require_once 'h.php';
        $db = new PDO($dsn, $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = 'SELECT * FROM users WHERE userid= :id AND password= :pass;';
  $prepare = $db->prepare($sql);
            $prepare->bindValue(':id',  PDO::PARAM_STR);
            $prepare->bindValue(':pass',  PDO::PARAM_STR);
            $prepare->execute();  
if ($users = $prepare -> fetch(PDO::FETCH_ASSOC))                 {
 $_SESSION['userid'] = $users['userid'];
 header('Location: main.php');
 }else{
 $error = '<p class="error">ＩＤとパスワードを確認してください</p>';
   }
  }
 
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>三宅メッセンジャー</title>
  </head>
  <body>
      <h1>三宅メッセンジャー</h1>
   
  <form  name="loginForm" action="loguin.php" method="POST">
  <fieldset>
  <legend>ログインフォーム</legend>
  <div><?php echo $errorMessage ?></div>
  <label for="userid">ユーザID</label><input type="text" id="userid" name="id" value="">
  <br>
  <label for="password">パスワード</label><input type="password" id="password" name="pass" value="">
  <br>
  <label></label><input type="submit" id="login" name="login" value="ログイン">
  </fieldset>
  </form>
  </body>
</html>