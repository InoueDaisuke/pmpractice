<html lang="ja">
    <head>
        <meta charset="UTF-8">

    </head>
    <body>

<?php

//print_r($_POST);
$userid=$_POST['userid'];
$password=$_POST['password'];
//データベースに接続
require_once 'database_conf.php';
$db = new PDO($dsn, $dbUser, $dbPass);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//検索
$sql = "select * from users where userid=:userid and password=:password";
$prepare=$db->prepare($sql);
$prepare->bindValue(":userid", $userid);
$prepare->bindValue(":password", $password);
$prepare->execute();
$result=$prepare->fetchAll(PDO::FETCH_ASSOC); 
 
if (count($result)==0) {
   $error='IDとパスワードが違います';
   session_start();
   $_SESSION['error']=$error;
    header('Location:login.php');
    echo "<a href='login.php'>戻る</a>"; 
 
} else {
    session_start();
    $error='';
    $_SESSION['error']=$error;
    $_SESSION['myid']=$userid;
header('Location:main.php');
}
?>
 </body>
</html>