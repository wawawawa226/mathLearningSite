<?php
session_start();
$_SESSION['login_error'] = "";

function h($var) //HTMLでのエスケープ処理をする関数
{
  if(is_array($var)){
    return array_map('h',$var);
  }else{
    return htmlspecialchars($var,ENT_QUOTES,'UTF-8');
  }
}

$mysqli = new mysqli("mysql147.phy.lolipop.lan", "LAA1128436", "ktush", "LAA1128436-math");

if( $mysqli->connect_errno ) {
echo $mysqli->connect_errno . ' : ' . $mysqli->connect_error;
}
$mysqli->set_charset('utf8');

$email = $_POST['email'] ;

$sql = "SELECT * FROM user_info WHERE mail='$email'";

$res = $mysqli->query($sql);


$data = $res->fetch_assoc();


//emailがDB内に存在しているか確認
if (!isset($data['mail'])) {
  $_SESSION['login_error'] = "エラー";
  header("Location: http://wawawawa.pigboat.jp/samurai/login-form.php?email=$email");
  return false;
}

$pass = $_POST['pass'];

if (password_verify("$pass", $data['password'])) {
  // ログイン成功
  session_regenerate_id(true); //session_idを新しく生成し、置き換える
  $_SESSION['NAME'] = $data['user_name'];
  header('Location: http://wawawawa.pigboat.jp/samurai/mypage.php');
  exit;
} else {
  $_SESSION['login_error'] = "エラー";
  header("Location: http://wawawawa.pigboat.jp/samurai/login-form.php?email=$email");
  return false;
}


?>
