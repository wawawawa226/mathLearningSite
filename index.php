<?php
session_start();
require_once dirname(__FILE__) . '/Commons/Common.php';
require_once dirname(__FILE__) .'/Explanations/ExplanationsData.php';
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
     <title>ニジマス.com</title>
   </head>
   <body>
     <header>
       <?php include __DIR__ . '/Commons/Header.php';?>
     </header>

     <div class="mypage-contents wrapper">
       <main>

         <div class="container shadow-sm mb-5 mt-3 p-3 border text-center" >
           <p class="text-secondary">会員登録をすると学習メモを保存することができます。<br>
             まずはゲストログインでお試しください！
           </p>
         </div>
         <!-- 未ログイン状態の場合、ゲストログインボタンを表示 -->
         <?php if( !isset( $_SESSION['id'] ) ): ?>
           <a class="btn btn-info btn-block mb-5" href="/User/Login/GuestLogin.php">ゲストログイン</a>
         <?php endif;?>

         <h3 class="graybold">新着記事</h3>
            <div class="container-fluid">
              <div class="row">
                <?php foreach($mathUnits as $mathUnit):?>
                  <div class="col-sm-6 mt-5 btn">
                    <a href="<?php echo $mathUnit->url?>"><h3 class="text-center mb-10 graybold"><?php echo $mathUnit->unitName;?></h3></a>
                    <a href="<?php echo $mathUnit->url?>"><img class="shadow-sm img-thumbnail w-100" src="<?php echo $mathUnit->image?>"></a>
                  </div>
                <?php endforeach?>

              </div>
            </div>
       </main>

       <aside>
         <?php include __DIR__ . '/Commons/Sidebar.php';?>
       </aside>
     </div>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
     <script src="/js/workbook.js"></script>
     <script src="/js/mypage.js"></script>
   </body>
 </html>
