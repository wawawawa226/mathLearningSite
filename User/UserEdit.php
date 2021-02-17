<?php
session_start();
require_once dirname(__FILE__) . '/../Commons/Common.php';
if(isset($_SESSION['id'])){
  // ログイン状態の場合
  $userName = $_SESSION['name'];
  $page_flag =  1 ;
  if($_SESSION['id'] == 73){
    // ゲストログインの場合
    $page_flag =  2 ;
  }

}else{
  // 未ログイン状態の場合
    $userName = "ゲスト";
    $loginCheck = "none";
    $page_flag =  2 ;
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
    <link href="/css/master.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>ユーザー情報の編集</title>
  </head>
  <body>
    <header>
      <?php include __DIR__ . '/../Commons/Header.php';?>
    </header>
    <div class="mypage-contents wrapper">
      <main>

        <div class="container shadow-sm mb-5 mt-3 p-3 border text-center" >
          <p>こちらでユーザー情報の編集、退会ができます。<br>
            ※未ログイン状態またはゲストログイン状態の方はこちらの機能を使用できません。<br>
          </p>
        </div>

        <div class="btn-toolbar">
          <div class="mx-auto">

          <?php if( $page_flag === 1 ): ?>
            <!-- 通常のログイン状態の場合 -->
            <a class="btn btn-success btn-lg" href="Update/UserUpdate.php">編集する</a>
            <a class="btn btn-danger btn-lg ml-5" href="Delete/UserDeleteCheck.php">退会する</a>
        <?php elseif( $page_flag === 2 ): ?>
            <!-- ゲストログイン状態、未ログイン状態の場合 -->
            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal1">編集する</button>
            <button class="btn btn-danger btn-lg ml-5" data-toggle="modal" data-target="#modal1">退会する</button>

          <div class="modal fade" id="modal1" tabindex="-1" role="dialog"
                aria-labelledby="label1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="label1">この機能は使用できません</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  未ログイン状態またはゲストログイン状態の方はこちらの機能を使用できません。<br>
                  ログインしてから再度お試しください。
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
              </div>
            </div>
          </div>

        <?php endif; ?>
          </div>
        </div>


      </main>

      <aside>
        <?php include __DIR__ . '/../Commons/Sidebar.php';?>
      </aside>
    </div>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      <script src="/js/workbook.js"></script>
      <script src="/js/mypage.js"></script>

      </body>

      </html>
