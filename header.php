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

<h1>
  <a href="/mathLearningSite/mypage.php">数学学習サイト</a>
</h1>

<?php if(isset($_SESSION['id'])):?>
  <!-- ログインしている場合 -->
  <div class="greet">
    <p>こんにちは！<?php echo $userName ;?>さん</p>
  </div>
<?php else:?>
<!-- ログインしていない場合、ログインリンクを設置 -->
<a href="/mathLearningSite/login-form.php">ログイン/新規登録</a>

<?php endif;?>

</div>
<nav>
  <ul>
    <li><a href="/mathLearningSite/mypage.php">マイページ</a></li>
    <li><a href="/mathLearningSite/workbook-list.php">問題一覧</a></li>
    <li><a href="/mathLearningSite/answer.php">テストを受ける</a></li>
  </ul>
</nav>

</body>
</html>
