<?php
session_start();
require_once dirname(__FILE__) . '/../../Commons/Common.php';
// 管理者でない場合、ページを表示できないようにする
if(!isset($_SESSION['id']) || ($_SESSION['id'] !== 79)){
  $_SESSION['message'] = "このページは管理者専用です。" ;
  header("Location:" . $url_mypage );
  exit();
}

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $dbh = db_connect();
  $res = $dbh->prepare('SELECT * FROM work_book WHERE work_number = :id');
  $res->bindValue(':id',(int)$id,PDO::PARAM_INT);
  $res->execute();
}else{
  header("Location:" . $url_mypage );
  exit();
}
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/list.css">
    <link rel="stylesheet" href="/css/list-workbook.css">
    <!-- BootstrapのCSS読み込み -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>問題削除確認画面</title>
  </head>
  <body style="margin:5%;">
    このデータを本当に削除しますか？
    <a class="btn btn-danger" href="WorkDeleteDone.php?id=<?php echo $id?>" role="button">はい</a>
    <a class="btn btn-primary" href="../WorkList.php" role="button">いいえ</a>"

    <table border="1">
    <tr>
      <th>NO.</th>
      <th>問題文</th>
      <th>解答</th>
      <th>難易度</th>
      <th>単元</th>
    </tr>
    <?php
    $data = $res->fetch(PDO::FETCH_ASSOC);
    ?>
    <tr>
      <td><?php echo $data["work_number"] ?> </td>
      <td><?php echo $data["work"] ?> </td>
      <td><?php echo $data["work_answer"] ?> </td>
      <td><?php echo $data["work_level"] ?> </td>
      <td><?php echo $data["unit"] ?> </td>
    </tr>


    </table>
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/workbook.js"></script>
  </body>
</html>
