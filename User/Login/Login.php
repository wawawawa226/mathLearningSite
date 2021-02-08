<?php
session_start();
require_once dirname(__FILE__) . '/../../Commons/Common.php';
if(isset($_SESSION['id'])){
  $_SESSION['message'] = "既にログインしています。";
  header("Location:" . $url_mypage );
  exit();
}
$_SESSION['login_error'] = "";

function h($var) //HTMLでのエスケープ処理をする関数
{
  if(is_array($var)){
    return array_map('h',$var);
  }else{
    return htmlspecialchars($var,ENT_QUOTES,'UTF-8');
  }
}
if(isset($_POST['email'])){
  $email = $_POST['email'] ;
  $dbh = db_connect();
  $prepare = $dbh->prepare("SELECT * FROM user_info WHERE mail=:email");
  $prepare->bindValue(':email',(string)$email,PDO::PARAM_STR);
  $prepare->execute();
  $data = $prepare->fetch(PDO::FETCH_ASSOC);
}

//emailがDB内に存在しているか確認
if (!isset($data['mail'])) {
  $_SESSION['login_error'] = "エラー";
  header("Location:" . $url_loginForm );
  exit();
}

$pass = $_POST['pass'];

if (password_verify("$pass", $data['password'])) {
  // ログイン成功
  session_regenerate_id(true); //session_idを新しく生成し、置き換える
  $_SESSION = array();
  $_SESSION['name'] = $data['user_name'];
  $_SESSION['id'] = $data['user_id'];
  $_SESSION['age'] = $data['age'];
  $_SESSION['math_lev'] = $data['math_lev'];
  $_SESSION['math_like'] = $data['math_like'];
  $_SESSION['club'] = $data['club'];
  header("Location:" . $url_mypage );
  exit();
} else {
  $_SESSION['login_error'] = "エラー";
  header("Location:" . $url_loginForm );
  exit();
}


?>
