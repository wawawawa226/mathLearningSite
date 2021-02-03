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
      <a href="/mathLearningSite/Mypage.php" class="navbar-brand">数学学習サイト</a>
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
          <a class="nav-item nav-link" href="/mathLearningSite/LoginForm.php">ログイン/新規登録</a>
          <?php endif;?>
          <a class="nav-item nav-link" href="/mathLearningSite/Mypage.php">マイページ</a>
          <a class="nav-item nav-link" href="/mathLearningSite/Explanations.php">学習する</a>
          <a class="nav-item nav-link" href="/mathLearningSite/Answer.php">テストを受ける</a>
        </div>
      </div>
    </div>
  </nav>
</body>
</html>