<?php
//h()関数を読み込みます。
require_once '/xampp/htdocs/miyakemesse/h.php';
// passward_verify()関数を読み込みます。
require_once '/xampp/htdocs/miyakemesse/password.php';
//クリックジャッキング対策をします。
header('X-FRAME-OPTIONS: SAMEORIGIN');
//セッションを開始します。
session_start();
//ユーザー名とパスワードを設定します。複数名分の設定ができます。
$userid[] ='root'; //ユーザーID
$username[] = '管理者'; //お名前
//パスワード[pass1]をpassword_hash()関数でハッシュ化した文字列
$hash[] = '$2$10$7llM8TDTW3cxrMPzwd1yd0ky3FP7yY0zn/d4bEQQbeFDiQ.tTbM30';
   
$userid[] ='test';
$username[] ='テスト';
// パスワード[pass2]をpassword_hash()関数でハッシュ化した文字列
$hash[] ='$2y$10$qNxqM4UP79klxfqV9cIwc06LBJI44Z34k76m9w9teN.PLpfTe7lxG';    
//エラーメッセージの変数を初期化します。
$error = '';
//認証済みかどうかのセッション変数を初期化します。
if (! isset($_SESSION['auth'])) {
    $_SESSION['aush'] = false;
}
if (isset($_POST['userid']) && isset($_POST['password'])) {
    foreach ($userid as $key => $value) {
    if($_POST['userid']  === $userid[$key] &&
//入力されたパスワード文字列とハッシュ化済みパスワードを照合します。
password_verify($_POST['password'], $hash[$key])){
//セッション固定化攻撃を防ぐため、セッションIDを変更します。
session_regenerate_id(true);
$_SESSION['auth']=true;
$_SESSION['username']=$username[$key];
break;
    }
    }
    
if ($_SESSION['auth'] === false){
    $error = 'ユーザーIDかパスワードに誤りがあります。';
    
}
}


if ($_SESSION['auth'] !== true){
 ?>

<!DOCTYPE html>
<html long="ja">
    <head>
        <meta charset='UTF-8'>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>三宅メッセンジャー</title>
    </head>
    <body>
    <div id="login">
<h1>認証フォーム</h1>
<?php
if($error){ //エラー文がセットされていれば赤色で表示
    echo '<p style"color:red;">'. h($error) .'</p>';
}
?>
<form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="post">
<dl>
    <dt><lavel for="userid">ユーザーID:</lavel></dt>
    <dd><input type="text" name="userid" id="userid" value=""></dd>
    </dl>
    <dl>
        <dt><label for="password">パスワード:</label></dt>
        <dd><input type="password" name="password　"id="password" value="ログイン"></dd>
    </dl>
    <input type="submit" name="submit"value="ログイン">
</form>
</div>
</html>
<?php
//スクリプトを終了し、認証が必要なページが表示されないようにします。
exit();
}
/* ?>省略タグ省略*/