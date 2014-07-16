<?php
require_once 'h.php';
session_start();
// ログイン状態のチェック
if (!isset($_SESSION["myid"])) {
  header("Location: logout.php");
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>友達リスト</title>
  </head>
     <CENTER> 
       <style>
         table{display:inline;}
       </style>
  <body>
    <table border="0" width="100%" vspace="0">
      <tr>
        <td align="center"><img src="vv.jpg" alt="title"></td>
      <td align="center"><form action="search.php" method="post"><BUTTON type="submit"/><IMG src="oo.jpg"></BUTTON></form></p>
       </td></tr>
       </table>
      <?php 
try{
        require_once 'database_conf.php';
        require_once 'h.php';
        $db = new PDO($dsn, $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT  * FROM friend WHERE myid LIKE :myid';
        $prepare = $db->prepare($sql);
        $prepare->bindValue(':myid', $_SESSION['myid'], PDO::PARAM_STR);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);           
        foreach ($result as $friend) {            
                    
                   
                     }
             } catch (PDOException $e) {
                    echo 'エラーが発生しました';
                }        
      ?>
      <?php foreach ($result as $friend) { ?> 
        <form action="start.php" method="POST">
            <input type="submit" name="friendid" value="<?php echo($friend["friendid"]);?>">
        </form>
<?php } ?>
     <br>
 
<form action="main.php" >
    <BUTTON type="submit"/><IMG src="zz.jpg"></nobr></BUTTON></form>
   </CENTER> </body>

</html>
