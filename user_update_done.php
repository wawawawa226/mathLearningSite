<?php
  require_once ('Common.php');
  session_start();
  print_r($_SESSION);
  $check_data_mail = "";
  // $_SESSION['id'] = 36 ;
  // nameが空でない、つまり正規のルートでアクセスされた場合に登録処理を行う。
  if(!empty($_POST["name"]) ){
    if(isset($_SESSION['id'])){
      $id = $_SESSION['id'];
    }else{
      $id = 123456;
    }
    $dbh = db_connect();
    $userName = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $mathLevel = $_POST["math-level"];
    $mathLike = $_POST["math-like"];
    $club = $_POST["club"];

    // echo $userName."<br>";
    // echo $email."<br>";
    // echo $age."<br>";
    // echo $mathLevel."<br>";
    // echo $mathLike."<br>";
    // echo $club."<br>";
    // echo $id."<br>";
    $name = htmlspecialchars($userName,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）
    $email = htmlspecialchars($email,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）
    $data = $dbh->prepare('UPDATE user_info
                              SET user_name = :userName, mail = :email, age = :age,
                                  math_lev = :mathLevel, math_like = :mathLike, club = :club
                              WHERE user_id = :id');
    $data->bindValue(':userName',(string)$userName,PDO::PARAM_STR);
    $data->bindValue(':email',(string)$email,PDO::PARAM_STR);
    $data->bindValue(':age',(string)$age,PDO::PARAM_STR);
    $data->bindValue(':mathLevel',(string)$mathLevel,PDO::PARAM_STR);
    $data->bindValue(':mathLike',(string)$mathLike,PDO::PARAM_STR);
    $data->bindValue(':club',(string)$club,PDO::PARAM_STR);
    $data->bindValue(':id',(int)$id,PDO::PARAM_INT);

    $data->execute();

    //session_idを新しく生成し、置き換える

    $judge = "完了" ;
    $pageFlag = 0 ;
  }else{
    $pageFlag = 1 ;
    $judge = "失敗" ;
  }
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
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/math-sign-up.js"></script>
    <title>更新<?php echo $judge;?> </title>
  </head>
  <body>
    <!-- データ登録が完了したとき -->
    <?php if ($pageFlag === 0): ?>

    <header>
      <?php include __DIR__ . '/header.php';?>
    </header>

    <div class="mypage-contents wrapper">
    <main>
    <h3>更新が完了しました</h3>
    <?php   print 'はじめまして、';
            print $userName;
            print 'さん！';
    ?>

    <a class="btn btn-success" href="math-sign-up.php" role="button">新規作成</a>
    <a class="btn btn-primary" href="user-list.php" role="button">ユーザー一覧</a>
  </main>
  <aside>
    <?php include __DIR__ . '/sidebar.php';?>
  </aside>
    </div>

    <!-- データ登録が完了しなかったとき -->
  <?php else: ?>
    <div class="form-box">
      <p>エラーが発生しました。</p>
      <a href="mypage.php" class="btn btn-outline-warning">マイページへ戻る</a>
  </div>
  <?php endif; ?>

  </body>
</html>
