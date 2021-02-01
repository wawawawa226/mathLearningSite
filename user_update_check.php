<?php
  session_start();
  require_once ('Common.php');
  $check_data_name = "";
  $check_data_mail = "";

  if(!empty($_POST["name"]) ){
    // $_POST["name"]が空でない場合、つまりuser_update経由で
    // ページ遷移した場合のみ登録確認処理をする。
    $name = $_POST["name"];
    $email = $_POST["email"];
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

    $dbh = db_connect();

    //入力していた値を保持するためにセッションへ代入しておく
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["age"] = $age;
    $_SESSION["math-level"] = $mathLevel;
    $_SESSION["math-like"] = $mathLike;
    $_SESSION["club"] = $club;
    // 登録処理のためにセキュリティ対策をしておく
    $name = htmlspecialchars($name,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）
    $email = htmlspecialchars($email,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）

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

      <!-- パスワードをハッシュ化-->
        <form action="user_update_done.php" method="post" id="sign_up" name="su">
          <input type="hidden" name="name" value="<?php echo $name?>">
          <input type="hidden" name="email" value="<?php echo $email?>">
          <input type="hidden" name="age" value="<?php echo $age ?>">
          <input type="hidden" name="math-level" value="<?php echo $mathLevel?>">
          <input type="hidden" name="math-like" value="<?php echo $mathLike?>">
          <input type="hidden" name="club" value="<?php echo $club ?>">

    <hr>
    <br>
      <div class="buttons">

      <div class="form-group">
        <a href="user-update.php" class="btn btn-secondary btn-block">修正する</a>
      </div>

      <div class="form-group">
        <button value="送信" class="btn btn-info btn-block">登録する</button>
      </div>

    </div>

    </form>
</div>
</body>
</html>
