<?php
  require_once ('Common.php');
  session_start();
  if(isset($_SESSION['id'])){
    $id = $_SESSION['id'] ;
    $memo = $_POST['memo'];
    $dbh = db_connect();
    $res = $dbh->prepare('INSERT INTO memo(user_id,memo,date) VALUES(:id,:memo,now())');
    $res->bindValue(':id',(int)$id,PDO::PARAM_INT);
    $res->bindValue(':memo',(string)$memo,PDO::PARAM_STR);
    $res->execute();
    $data = "通信成功";
  }else{
    $data = "ログインされていません";
  }
  header("Content-type: application/json; charset=UTF-8");
  //JSONデータを出力
  echo json_encode($data);
  exit;
?>
