<?php
// データベース設定
$dbServer = '127.0.0.1';
$dbUser = 'User';
$dbPass = 'sample';

//MySQL用のDSN文字列です。
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8;
// SQLite用のDSN文字列です。
//$dsn = "splite:../../../../data/sqlite/sample.db";