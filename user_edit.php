<?php
session_start();
require_once ('Common.php');
if(isset($_SESSION["NAME"])){
  $userName = $_SESSION['NAME'];
}else{
    $userName = "ゲスト";
    $loginCheck = "none";
  }

?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/master.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/workbook.js"></script>
    <script src="js/mypage.js"></script>
    <title>ユーザー情報の編集</title>
  </head>
  <body>
    <header>
      <?php include __DIR__ . '/header.php';?>
    </header>
    <div class="mypage-contents wrapper">
      <main>
        <div class="btn-toolbar">
          <div class="btn-group mx-auto">
            <a class="btn btn-success btn-lg" href="user-update.php">編集する</a>
            <a class="btn btn-danger btn-lg ml-5" href="user-delete-check.php">退会する</a>
          </div>
        </div>
        <div class="container-fluid border mt-2 text-center" >
          <p class="mt-5">説明などを記述予定</p>
          <p class="">説明などを記述予定</p>
        </div>

      </main>

      <aside>
        <?php include __DIR__ . '/sidebar.php';?>
      </aside>
    </div>

      </body>

      </html>
