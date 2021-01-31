<?php
session_start();
require_once ('Common.php');
require_once ('explanations_data.php');

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
    <title>解説記事一覧</title>
  </head>
  <body>
    <header>
      <?php include __DIR__ . '/header.php';?>
    </header>

    <div class="mypage-contents wrapper">
      <main>
        <h1 class="text-center graybold border-0">中１単元一覧</h1>
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
