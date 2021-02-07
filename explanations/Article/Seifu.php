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
    <title>正負の数</title>
  </head>
  <body>
    <header>
      <?php require_once(dirname(__FILE__)."/../Header.php");?>

    </header>

    <div class="mypage-contents wrapper">
      <main>
        <h3 class="graybold">正負の数</h3>
        <!-- パンくずリスト -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../Mypage.php">マイページ</a></li>
            <li class="breadcrumb-item"><a href="../Explanations.php">中１数学</a></li>
            <li class="breadcrumb-item active" aria-current="page">正負の数</li>
          </ol>
        </nav>

        <!-- 用語集 -->
        <div class="card shadow-sm mb-5">
          <div class="card-header">用語集</div>
          <div class="card-body">
            <a href="">負の数</a>
            <a href="">符号</a>
            <a href="">自然数</a>
            <a href="">絶対値</a>
            <a href="">不等号</a>
          </div>
        </div>

        <!-- 目次 -->
        <div class="card shadow-sm mb-5">
          <div class="card-header">目次</div>
            <div class="list-group">
              <a class="list-group-item list-group-item-action" href="#plus">1.正負の数とは？</a>
              <a class="list-group-item list-group-item-action" href="#minus">2.負の数の文章問題</a>
              <a class="list-group-item list-group-item-action" href="#">3.絶対値とは？</a>
              <a class="list-group-item list-group-item-action" href="#">4.正負の数の加法・減法</a>
              <a class="list-group-item list-group-item-action" href="#">5.正負の数の乗法・除法</a>
          </div>
        </div>

        <h3 id="plus" class="graybold">正負の数とは？</h3>
        <div class="container shadow-sm mb-5 mt-3 p-3 border">
          <p>０より大きい数のことを正の数と呼び、０より小さい数のことを負の数と呼びます。</p>
          <p>正の数は+の符号をつけて、+２（プラス２）と表し、０よりも２大きいという意味を持ちます。</p>
          <p>負の数は-の符号をつけて、-２（マイナス２）と表し、０よりも２小さいという意味を持ちます。</p>
          <p>（図を挿入,線分図のアニメーション？バー）</p>
          <p>また整数には、負の整数、０、正の整数があり、特に正の整数を自然数と呼びます。</p>
          <p>図を挿入</p>
          <p><a href="#">演習問題へ</a></p>
        </div>

        <h3 id="minus" class="graybold">負の数の文章問題</h3>
        <div class="container shadow-sm mb-5 mt-3 p-3 border">
          <p>負の数の意味を理解するために、文章問題を解いてみましょう。</p>
          <p>ただ、この問題では対義語の知識も必要になりますので、まずはよく出る対義語のチェックをしてみましょう！(クリックすると対義語に変わります。)</p>
          <button type="button" class="btn btn-primary "id="rev1">北</button>
          <button type="button" class="btn btn-primary "id="rev2">進んだ</button>
          <button type="button" class="btn btn-primary "id="rev3">多い</button>
          <button type="button" class="btn btn-primary "id="rev4">収入</button><br>

          <br><p>例題：同じ意味になるように、 に当てはまる数字や言葉を答えましょう。</p>
              <hr>
              <p id="q1">(1)北に3km進んだ<br>→南に<span id="w1"> </span>km進んだ</p>
              <button type="button" class="btn btn-primary "id="a1">答えを表示</button>
              <hr>
              <p id="q2">(2)兄のお小遣いは僕のお小遣いより2000円多い<br>
                →兄のお小遣いは僕のお小遣いより-2000円<span id="w2"> </span></p>
              <button type="button" class="btn btn-primary "id="a2">答えを表示</button>
              <hr>
              <p id="q3">(3)今年は-300万円の支出があった。<br>
                →今年は300万円の<span id="w3"> </span>があった。</p>
              <button type="button" class="btn btn-primary "id="a3">答えを表示</button>

              <p><a href="#">演習問題へ</a></p>
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
        <?php require_once(dirname(__FILE__)."/../Sidebar.php");?>
      </aside>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="../js/workbook.js"></script>
    <script src="../js/mypage.js"></script>
    <script src="../js/math.js"></script>
    <script src="../js/memo.js"></script>
  </body>
</html>
