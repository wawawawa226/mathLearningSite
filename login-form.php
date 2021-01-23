<?php
session_start();
require_once ('Common.php');
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/master.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>ログイン画面</title>
  </head>
  <body>

<div class="form-box">
    <h3>ログイン</h3>
      <form action="login.php" method="post" id="login" name="su">
        <?php echo $error ;?>
          <div class="form-group">
            <label class="control-label" for="email">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($email)){echo $email;}?>" required>
            <p>guest@taro.dt</p>
            <div class="error" id="error_mail" style="display:none;">メールアドレスが入力されていません</div>
          </div>

          <div class="form-group">
            <label class="control-label" for="pass">パスワード</label>
            <input type="password" class="form-control" id="pass" name="pass" maxlength="10" required>
            <p>admin1415</p>
            <div class="error" id="error_pass" style="display:none;">パスワードが入力されていません</div>
          </div>

          <div class="form-group">
            <button value="ログイン" class="btn btn-outline-info btn-block">ログイン</button>
          </div>

     </form>
   </div>
  <div class="form-box-sub">
    <h3>初めてのご利用ですか?</h3><br>
   <button class="btn btn-outline-secondary btn-block"><a href="math-sign-up.php">新規登録はこちら</a></button>
 </div>
</body>
</html>
