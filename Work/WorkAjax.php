<?php
  require_once ('Common.php');
  $level = $_POST['level'];
  $unit = $_POST['unit'];
  $workNumber = $_POST['work_number'];
  // dbに接続して問題番号、問題文、答えの情報を取得する
  $dbh = db_connect();
  $res = $dbh->prepare('SELECT * FROM work_book WHERE work_level = :level AND unit = :unit AND NOT work_number = :workNumber');
  $res->bindValue(':level',(int)$level,PDO::PARAM_INT);
  $res->bindValue(':unit',(string)$unit,PDO::PARAM_STR);
  $res->bindValue(':workNumber',(int)$workNumber,PDO::PARAM_INT);
  $res->execute();
  $data = $res->fetchAll(PDO::FETCH_ASSOC);
  // 複数取得した問題からランダムに一つ選んで代入する
  $ren = count($data);
  $rand = mt_rand(0, $ren-1);

  $data = $data[$rand];

  header("Content-type: application/json; charset=UTF-8");
  //JSONデータを出力
  echo json_encode($data);
  exit;
?>
