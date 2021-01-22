<?php
session_start();
require_once ('Common.php');
if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
  $dbh = db_connect();
  $res = $dbh->prepare('DELETE FROM work_book WHERE work_number  = :id');
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
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="css/list-workbook.css">
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/workbook.js"></script>
    <title>問題削除完了画面</title>
  </head>
  <body style="margin:5%;">
    削除が完了しました。<br>
    <a class="btn btn-success" href="workbook.php" role="button">新規作成</a>
    <a class="btn btn-primary" href="workbook-list.php" role="button">問題集一覧</a>



    </table>
  </body>
</html>
