<?php
  session_start();
  require_once ('Common.php');
  if(isset($_SESSION['id'])){
    $_SESSION['message'] = "既にログインしています。";
    header("Location:" . $url_mypage );
    exit();
  }
  $_SESSION = array();
  $check_data_name = "";
  $check_data_mail = "";

  if(!empty($_POST["name"]) ){
    // $_POST["name"]が空でない場合、つまりmath-sign-up経由で
    // ページ遷移した場合のみ登録確認処理をする。
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass1 = $_POST["pass1"];
    $age = $_POST["age"];
    $mathLevel = $_POST["math-level"];
    $mathLike = $_POST["math-like"];
    $clubType = $_POST["clubType"];
    if ($clubType == "運動部") {
      $club = $_POST["clubSports"];
    } else if ($clubType == "文化部") {
      $club = $_POST["clubCultures"];
    } else {
      $club = $_POST["clubNone"];
    }
    // 入力された名前、メールアドレスが既に登録済みでないかをチェックする。
    $dbh = db_connect();

    // 名前の重複チェック
    $check_res_name = $dbh->prepare('SELECT count(*) FROM user_info WHERE user_name = :name');
    $check_res_name->bindValue(':name',(string)$name,PDO::PARAM_STR);
    $check_res_name->execute();
    $check_data_name = $check_res_name->fetch(PDO::FETCH_ASSOC);
    // print_r($check_data_name);

    // メールアドレスの重複チェック
    $check_res_mail = $dbh->prepare('SELECT count(*) FROM user_info WHERE mail = :mail');
    $check_res_mail->bindValue(':mail',(string)$email,PDO::PARAM_STR);
    $check_res_mail->execute();
    $check_data_mail = $check_res_mail->fetch(PDO::FETCH_ASSOC);
    // print_r($check_data_mail);


    // 名前、メールアドレスのカウントが0でないならば登録済みであると判断できる
    if($check_data_name["count(*)"] !== 0){
      // 名前重複時のエラーメッセージ
      $_SESSION["nameOverlapping"]="<p class=\"error\"><i class=\"fas fa-exclamation-triangle\"></i>そのニックネームは既に使用されています。</p>";
      // echo $_SESSION["nameOverlapping"];
    }
      // メールアドレス重複時のエラーメッセージ
    if($check_data_mail["count(*)"] !== 0){
      $_SESSION["mailOverlapping"]="<p class=\"error\"><i class=\"fas fa-exclamation-triangle\"></i>そのメールアドレスは既に登録されています。</p>";
      // echo $_SESSION["mailOverlapping"];

    }

    //入力していた値を保持するためにセッションへ代入しておく
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["age"] = $age;
    $_SESSION["math-level"] = $mathLevel;
    $_SESSION["math-like"] = $mathLike;
    $_SESSION["club"] = $club;

    if($check_data_name["count(*)"] !== 0 or $check_data_mail["count(*)"] !== 0){

      // 名前またはメールが登録済みである場合、エラーメッセージを格納して入力画面に戻す
      header("Location:" . $url_signUp );
      exit();

    }else{
      // 名前とメールアドレスがどちらも登録済みでない場合、登録処理のためにセキュリティ対策をしておく
      $name = htmlspecialchars($name,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）
      $email = htmlspecialchars($email,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）
      $pass1 = htmlspecialchars($pass1,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）
    }
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
    <link href="css/signup.css" rel="stylesheet">
    <title>数学登録画面</title>
  </head>
  <body>

<div class="form-box form-check container">
    <h3>確認</h3>

    <!-- 確認画面として入力内容を出力 -->
      <label class="control-label" for="name">ニックネーム</label>
      <p id="name"><?php echo $name?></p>

      <label class="control-label" for="mail">メールアドレス</label>
      <p id="mail"><?php echo $email?></p>

      <label class="control-label" for="age">学年</label>
      <p id="age"><?php echo $age ?></p>

      <label class="control-label" for="mathLevel">数学は得意ですか？</label>
      <p id="mathLevel"><?php echo $mathLevel ?></p>

      <label class="control-label" for="mathLike">数学は好きですか？</label>
      <p id="mathLike"><?php echo $mathLike ?></p>

      <label class="control-label" for="club">部活動</label>
      <p id="club"><?php echo $club?></p>

      <!-- type hidden で送信内容のフォームを作成-->
    <?php $pass1 = password_hash("$pass1", PASSWORD_DEFAULT);?>
      <!-- パスワードをハッシュ化-->
        <form action="math-signup-done.php" method="post" id="sign_up" name="su">
          <input type="hidden" name="name" value="<?php echo $name?>">
          <input type="hidden" name="email" value="<?php echo $email?>">
          <input type="hidden" name="pass1" value="<?php echo $pass1?>">
          <input type="hidden" name="age" value="<?php echo $age ?>">
          <input type="hidden" name="math-level" value="<?php echo $mathLevel?>">
          <input type="hidden" name="math-like" value="<?php echo $mathLike?>">
          <input type="hidden" name="club" value="<?php echo $club ?>">

    <hr>
    <br>
      <div class="buttons">

      <div class="form-group">
        <a href="signup.php" class="btn btn-secondary btn-block">修正する</a>
      </div>

      <div class="form-group">
        <button value="送信" class="btn btn-info btn-block">登録する</button>
      </div>

    </div>

    </form>
</div>
</body>
</html>
