<?php
if(isset($_SESSION['id'])){
  $userName = $_SESSION['name'];
}else{
  $userName = "ゲスト";
  $loginCheck = "none";
}
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-light border-bottom mb-3" style="background-color:#fff;">
    <div class="container">
      <a href="https://nijimath.com" class="navbar-brand">数学学習サイト</a>
      <button class="navbar-toggler" type="button"
        data-toggle="collapse"
        data-target="#navmenu1"
        aria-controls="navmenu1"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu1">
        <div class="navbar-nav">
          <?php if(isset($_SESSION['id'])):?>
            <!-- ログインしている場合 -->
            <span class="nav-item nav-link">こんにちは！<?php echo $userName ;?>さん</span>
          <?php else:?>
            <!-- ログインしていない場合、ログインリンクを設置 -->
            <a class="nav-item nav-link" href="/User/Login/LoginForm.php">ログイン/新規登録</a>
          <?php endif;?>
            <a class="nav-item nav-link" href="/User/Mypage.php">マイページ</a>
            <a class="nav-item nav-link" href="/Explanations/Explanations.php">学習する</a>
            <a class="nav-item nav-link" href="/Work/Answer.php">テストを受ける</a>
          <?php if(isset($_SESSION['id'])):?>
            <!-- ログインしている場合、ログアウトリンクを設置 -->
            <a class="nav-item nav-link text-right" href="/User/Logout.php">ログアウト</a>
          <?php endif;?>
        </div>
      </div>
    </div>
  </nav>
</body>
</html>
