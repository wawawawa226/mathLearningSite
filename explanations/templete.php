<?php
require_once(dirname(__FILE__)."/../Common.php");
session_start();
$memo_display = "block" ;
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="../css/master.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>タイトル</title>
  </head>
  <body>
    <header>
      <?php require_once(dirname(__FILE__)."/../header.php");?>

    </header>

    <div class="mypage-contents wrapper">
      <main>
        <h3 class="graybold">単元名</h3>
        <!-- パンくずリスト -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../mypage.php">マイページ</a></li>
            <li class="breadcrumb-item"><a href="../explanations.php">中１数学</a></li>
            <li class="breadcrumb-item active" aria-current="page">正負の数</li>
          </ol>
        </nav>

        <!-- 用語集 -->
        <div class="card shadow-sm mb-5">
          <div class="card-header">用語集</div>
          <div class="card-body">
            <a href="">負の数</a>

          </div>
        </div>

        <!-- 目次 -->
        <div class="card shadow-sm mb-5">
          <div class="card-header">目次</div>
            <div class="list-group">
              <a class="list-group-item list-group-item-action" href="#plus">1.正負の数とは？</a>

          </div>
        </div>

        <h3 id="plus" class="graybold">項目名</h3>
        <div class="container shadow-sm mb-5 mt-3 p-3 border">


        </div>

        <h3 id="minus" class="graybold">項目名</h3>
        <div class="container shadow-sm mb-5 mt-3 p-3 border">

          </div>

          <!-- ページネーション -->
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>

      </main>

      <aside>
        <?php require_once(dirname(__FILE__)."/../sidebar.php");?>
      </aside>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="../js/workbook.js"></script>
    <script src="../js/mypage.js"></script>
    <script src="../js/math.js"></script>
  </body>
</html>
