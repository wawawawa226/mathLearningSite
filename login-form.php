<?php
session_start();
require_once ('Common.php');
if(isset($_SESSION['id'])){
  $_SESSION['message'] = "既にログインしています。";
  header("Location:" . $url_mypage );
  exit();
}
$error = "";
  function h($var) //HTMLでのエスケープ処理をする関数
  {
    if(is_array($var)){
      return array_map('h',$var);
    }else{
      return htmlspecialchars($var,ENT_QUOTES,'UTF-8');
    }
  }


  if(isset($_SESSION['login_error'])){
    $_SESSION['login_error'] = "";
    $error = "<p class=\"error_login\"><i class=\"fas fa-exclamation-triangle\">
    </i>メールアドレスまたはパスワードが間違っています。</p>";
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
    <link href="css/master.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>ログイン画面</title>
  </head>
  <body>
      <header>
        <?php include __DIR__ . '/header.php';?>
      </header>

<div class="form-box container">
    <h3>ログイン</h3>
      <form action="login.php" method="post" id="login" name="su">
        <?php echo $error ;?>
          <div class="form-group">
            <label class="control-label" for="email">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($email)){echo $email;}?>" required>

            <div class="error" id="error_mail" style="display:none;">メールアドレスが入力されていません</div>
          </div>

          <div class="form-group">
            <label class="control-label" for="pass">パスワード</label>
            <input type="password" class="form-control" id="pass" name="pass" maxlength="10" required>
            <div class="error" id="error_pass" style="display:none;">パスワードが入力されていません</div>
          </div>

          <div class="form-group">
            <button value="ログイン" class="btn btn-outline-info btn-block">ログイン</button>
          </div>

     </form>
   </div>
  <div class="form-box-sub">
    <h3>初めてのご利用ですか?</h3><br>
   <button class="btn btn-outline-secondary btn-block"><a href="signup.php">新規登録はこちら</a></button>
 </div>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
