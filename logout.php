<?php
session_start();
$output = '';
if (isset($_SESSION["NAME"])) {
  $output = 'Logoutしました。';
} else {
  $output = 'SessionがTimeoutしました。';
}
//セッション変数のクリア
$_SESSION = array();
//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
//セッションクリア
@session_destroy();

echo $output;
echo"<br><a class=\"btn btn-success\" href=\"login-form.php\" role=\"button\">ログイン</a><br>";
echo"<br><a class=\"btn btn-success\" href=\"mypage.php\" role=\"button\">マイページ</a>";
