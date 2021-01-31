<?php
  require_once ('Common.php');
  session_start();
  $check_data_mail = "";

  // nameが空でない、つまり正規のルートでアクセスされた場合に登録処理を行う。
  if(!empty($_POST["name"]) ){
    $dbh = db_connect();
    $userName = $_POST["name"];
    $email = $_POST["email"];

    // リロードでのデータ重複を防ぐために、既に同じメールアドレスが登録されていないか確かめる
    $check_res_mail = $dbh->prepare('SELECT count(*) FROM user_info WHERE mail = :mail');
    $check_res_mail->bindValue(':mail',(string)$email,PDO::PARAM_STR);
    $check_res_mail->execute();
    $check_data_mail = $check_res_mail->fetch(PDO::FETCH_ASSOC);

    //$check_dataのカウントが 0 （データが重複していない） なら情報をDBに登録
    if($check_data_mail["count(*)"] == 0){
      $pass1 = $_POST["pass1"];
      $age = $_POST["age"];
      $mathLevel = $_POST["math-level"];
      $mathLike = $_POST["math-like"];
      $club = $_POST["club"];
      $userName = htmlspecialchars($userName,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）
      $email = htmlspecialchars($email,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）
      $pass1 = htmlspecialchars($pass1,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）

      $data = $dbh->prepare("INSERT INTO user_info(user_name,mail,password,age,math_lev,math_like,club,in_date,up_date)
                            values (:userName,:email,:pass1,:age,:mathLevel,:mathLike,:club,now(),now())");

      $data->bindValue(':userName',(string)$userName,PDO::PARAM_STR);
      $data->bindValue(':email',(string)$email,PDO::PARAM_STR);
      $data->bindValue(':pass1',(string)$pass1,PDO::PARAM_STR);
      $data->bindValue(':age',(string)$age,PDO::PARAM_STR);
      $data->bindValue(':mathLevel',(string)$mathLevel,PDO::PARAM_STR);
      $data->bindValue(':mathLike',(string)$mathLike,PDO::PARAM_STR);
      $data->bindValue(':club',(string)$club,PDO::PARAM_STR);

      $data->execute();

      //session_idを新しく生成し、置き換える
      session_regenerate_id(true);
      // DB登録後、user_idを取り出してセッションに保存する
      $prepare = $dbh->prepare("SELECT user_id FROM user_info WHERE user_name = :name AND mail = :mail");
      $prepare->bindValue(':name',(string)$userName,PDO::PARAM_STR);
      $prepare->bindValue(':mail',(string)$email,PDO::PARAM_STR);
      $prepare->execute();
      $res = $prepare->fetch(PDO::FETCH_ASSOC);
      $_SESSION = array();
      $_SESSION['name'] = $userName;
      $_SESSION['id'] = $res['user_id'];
      $judge = "完了" ;
      $pageFlag = 0 ;
    }else{
      $pageFlag = 1;
      $judge = "失敗";
    }
  }else{
    $pageFlag = 1;
    $judge = "失敗";
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
    <title>登録<?php echo $judge;?> </title>
  </head>
  <body>
    <!-- データ登録が完了したとき -->
    <?php if ($pageFlag === 0): ?>

    <header>
      <?php include __DIR__ . '/header.php';?>
    </header>

    <div class="mypage-contents wrapper">
    <main>
    <h3 class="graybold">登録が完了しました</h3>
    <p>はじめまして、<?php echo $_SESSION['name']."さん" ; ?></p>
    <a class="btn btn-primary" href="mypage.php" role="button">マイページへ</a>
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
