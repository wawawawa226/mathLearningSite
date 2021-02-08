<?php
require_once dirname(__FILE__) . '/../../Commons/Common.php';
session_start();
if(!isset($_SESSION['id'])){
  session_regenerate_id(true); //session_idを新しく生成し、置き換える
  $_SESSION = array();
  $_SESSION['name'] = "ゲストユーザー";
  $_SESSION['id'] = 73;
  $_SESSION['message'] = "ゲストログインに成功しました";
  $_SESSION['age'] = "大学生以上" ;
  $_SESSION['math_lev'] = "どちらかといえば得意";
  $_SESSION['math_like'] = "どちらかといえば好き";
  $_SESSION['club'] = "パソコン部";
  header("Location:" . $url_mypage );
  exit();
}else{
  $_SESSION['message'] = "既にログイン中のため、ゲストログインはできません。";
  header("Location:" . $url_mypage );
  exit();
}

?>
