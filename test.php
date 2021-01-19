<?php
  require_once ('Common.php');
  $name ="さくま";
  $name2 = "or まめおに";
  $name3 = "'浦島' or 'まめおに'";
  $age = "小６";
  $dbh = db_connect();
  // $prepare = $dbh->prepare("SELECT * FROM user_info WHERE user_name = 'さくま' AND age='小６'");
  $prepare = $dbh->prepare("SELECT * FROM user_info WHERE user_name = :name AND age = :age");
  $prepare->bindValue(':name',(string)$name,PDO::PARAM_STR);
  $prepare->bindValue(':age',(string)$age,PDO::PARAM_STR);
  var_dump($prepare);
  echo"<br>";
  $prepare->execute();
  var_dump($prepare);
  echo"<br>";

  $res = $prepare->fetchAll(PDO::FETCH_ASSOC);
  var_dump($res);
  echo"<br>";

  // $result = $prepare->fetch();
  // print_r($result);
  //
  // $dbh = db_connect();
  // $check_res_name = $dbh->prepare('SELECT count(*) FROM user_info WHERE user_name = :name');
  // $check_res_name->bindValue(':name',(string)$name,PDO::PARAM_STR);
  // $check_res_name->execute();
  // $check_data_name = $check_res_name->fetch(PDO::FETCH_ASSOC);
  //
  //
  // $data = $dbh->prepare("INSERT INTO user_info(user_name,mail,password,age,math_lev,math_like,club,in_date,up_date)
  //                       values (:userName,:email,:pass1,:age,:mathLevel,:mathLike,:club,now(),now())");
  //
  // $data->bindValue(':userName',(string)$userName,PDO::PARAM_STR);
  // $data->bindValue(':email',(string)$email,PDO::PARAM_STR);
  // $data->bindValue(':pass1',(string)$pass1,PDO::PARAM_STR);
  // $data->bindValue(':age',(string)$age,PDO::PARAM_STR);
  // $data->bindValue(':mathLevel',(string)$mathLevel,PDO::PARAM_STR);
  // $data->bindValue(':mathLike',(string)$mathLike,PDO::PARAM_STR);
  // $data->bindValue(':club',(string)$club,PDO::PARAM_STR);
  // $data->execute();
  //
  // require_once ('Common.php');
  // $id = $_GET['id'];
  // $dbh = db_connect();
  // $res = $dbh->prepare('DELETE FROM user_info WHERE user_id = :id');
  // $res->bindValue(':id',(int)$id,PDO::PARAM_INT);
  // $res->execute();

 ?>
