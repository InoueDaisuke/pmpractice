<?php
// データベース設定
$dbServer = '175.184.35.36';
$dbUser   = 'ct4ttvj_azd';
$dbPass   = '8OT2LW1q';
$dbName   = 'ct4ttvj_azd';

# MySQL用のDSN文字列です。
$dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8',

 $_SERVER["C4SA_MYSQL_HOST"],

 $_SERVER["C4SA_MYSQL_DB"]);

$db = new PDO($dsn, $dbUser, $dbPass);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
