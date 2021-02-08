<?php
require_once dirname(__FILE__) . '/../../Commons/Common.php';
session_start();
if(isset($_SESSION['user_delete_id'])){
  $id = $_SESSION['user_delete_id'];
  unset($_SESSION['user_delete_id']);
  $dbh = db_connect();
  $res = $dbh->prepare('DELETE FROM user_info WHERE user_id = :id');
  $res->bindValue(':id',(int)$id,PDO::PARAM_INT);
  $res->execute();
  $_SESSION = array();
  $_SESSION['massage'] = "削除が完了しました";
  header("Location:" . $url_mypage );
  exit();
}else{
  header("Location:" . $url_mypage );
  exit();
}
?>
