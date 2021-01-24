<?php
session_start();
require_once ('Common.php');
if(isset($_SESSION['name'])){
  $userName = $_SESSION['name'];
}else{
    $userName = "ゲスト";
    $loginCheck = "none";
  }
  $loginCheck = "none";
  print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/master.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/workbook.js"></script>
    <script src="js/mypage.js"></script>
    <title>マイページ</title>
  </head>
  <body>
    <header>
      <?php include __DIR__ . '/header.php';?>
    </header>

    <div class="mypage-contents wrapper">
      <main>


        <div class="tabs">

          <p class="tab tab-checked" id="tab-note"><i class="fas fa-book-open"></i> 学習ノート</p>
          <p class="tab" id="tab-result"><i class="far fa-file-alt"></i> 得点管理</p>
          <p class="tab" id="tab-info"><i class="fas fa-cog"></i> 会員情報の変更</p>
        </div>

        <div class="item tab-content tab-content-checked" id="content-note">
          <p class="content-none"><i class="fas fa-book-open"></i> まだノートはありません</p>
        </div>

        <div class="item tab-content" id="content-result">
          <p class="content-none"><i class="far fa-file-alt"></i> まだテスト結果がありません</p>
        </div>

        <div class="item tab-content" id="content-info">
          <p class="content-none"><i class="far fa-file-alt"></i> <?php echo $userName?></p>
          <p><a href="user_edit.php">会員情報を変更する</a></p>
          <p><a href="logout.php">ログアウト</a></p>
        </div>


      </main>

      <aside>
        <?php include __DIR__ . '/sidebar.php';?>
      </aside>
    </div>

  </body>
</html>
