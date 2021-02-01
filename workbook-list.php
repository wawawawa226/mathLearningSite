<?php
require_once 'Common.php';
session_start();
// 管理者でない場合、ページを表示できないようにする
if(!isset($_SESSION['id']) || ($_SESSION['id'] !== 79)){
  $_SESSION['message'] = "このページは管理者専用です。" ;
  header("Location:" . $url_mypage );
  exit();
}

$dbh = db_connect();
$prepare = $dbh->prepare('SELECT * FROM work_book');
$prepare->execute();
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
    <title>問題一覧画面</title>
  </head>
  <body>
    <header>
      <?php include __DIR__ . '/header.php';?>
    </header>
    <div class="container">
    <a class="btn btn-success" href="workbook.php" role="button">新規登録</a>
    <table border="1">
    <tr>
      <th>NO.</th>
      <th>問題文</th>
      <th>解答</th>
      <th>難易度</th>
      <th>単元</th>
      <th>操作</th>
    </tr>
    <?php
    while($result = $prepare->fetch(PDO::FETCH_ASSOC)) {

    ?>
    <tr>
    <td><?php echo $result["work_number"]; ?> </td>
    <td><?php echo $result["work"]; ?> </td>
    <td><?php echo $result["work_answer"]; ?> </td>
    <td><?php echo $result["work_level"]; ?> </td>
    <td><?php echo $result["unit"]; ?> </td>
    <td><?php echo "<a href = workbook-update.php?id=".$result["work_number"].">編集</a><br>
                    <a href = workbook-delete-check.php?id=".$result["work_number"].">削除</a>";?></td>
    </tr>
    <?php

    }
    ?>

    </table>
  </div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/workbook.js"></script>
  </body>
</html>
