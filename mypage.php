<?php
session_start();
require_once ('Common.php');

// ログイン状態のチェック
if(isset($_SESSION['id'])){
  // ログイン状態
  $userName = $_SESSION['name'];
}else{
  // 未ログイン状態
  $userName = "ゲスト";
  $loginCheck = "false";
}

print_r($_SESSION);

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
    <title>マイページ</title>
  </head>
  <body>
    <header>
      <?php include __DIR__ . '/header.php';?>
    </header>

    <div class="mypage-contents wrapper">
      <main>
        <!-- エラーメッセージがある場合、上部に表示して破棄する -->
        <?php if( isset( $_SESSION['message'] ) ):?>
          <div class="container mb-5 border p-1">
            <div class="text-center">
              <?php echo $_SESSION['message'];?>
              <?php unset($_SESSION['message']);?>
            </div>
          </div>
        <?php endif;?>

        <!-- 未ログイン状態の場合、ゲストログインボタンを表示 -->
        <?php if( !isset( $_SESSION['id'] ) ): ?>
          <a class="btn btn-info btn-block mb-5" href="guest_login.php">ゲストログイン</a>
        <?php endif;?>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/workbook.js"></script>
    <script src="js/mypage.js"></script>
  </body>
</html>
