<?php
// データベース設定
$dbServer = '127.0.0.1';
$dbUser   = 'Miura';
$dbPass   = 'ybkc';
$dbName   = 'mydb';

# MySQL用のDSN文字列です。
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";