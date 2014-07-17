<?php

try {
$dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8',
  $_SERVER["C4SA_MYSQL_HOST"],
  $_SERVER["C4SA_MYSQL_DB"]);                   
$db = new PDO($dsn, $_SERVER["C4SA_MYSQL_USER"], $_SERVER["C4SA_MYSQL_PASSWORD"]);
} catch (PDOException $e) {
    echo "接続できませんでした".$e->getMessage();
}

try{
$sql = "SELECT link from map where id = 7";
$prepare = $db->prepare($sql);
$prepare->execute();
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

echo '<dl>';
foreach ($result as $map) {
    
    $link = $map['link'];
    echo "<dt><a href='$link' target='_blank'>$link</a></dt>"; 
}
echo '</dl>';

} catch (PDOException $e) {
    echo "取得失敗".$e->getMessage();
}

?>