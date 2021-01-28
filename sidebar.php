<?php
if(!isset($memo_display)){
  $memo_display = "none";
}

if(!isset($_SESSION['id'])){
  // 未ログイン状態
  $noLogin = "disabled";
  $display = "block";
}else{
  // ログイン状態
  $noLogin ="";
  $display = "none";
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

<form action="sidebar.php" method="post" style="display:<?php echo $memo_display;?>;">
  <h3 class="sub-title">学習メモ</h3>
  <div class="form-group">
    <textarea id="memo" class="form-control"></textarea>
  </div>
  <div class="form-droup">
    <div class="error text-justify" style="display:<?php echo $display;?>;">ログインすると使用できます。</div>
    <button type="button" <?php echo $noLogin;?> id="save_memo" name="btn_confirm" class="btn btn-sm btn-block btn-info mb-5">保存する</button>
  </div>
</form>

<h3 class="sub-title">中学生数学</h3>
<ul class="sub-menu">
  <li><a href="/mathLearningSite/explanations.php">中学１年生</a></li>
  <li><a href="/mathLearningSite/explanations.php">中学２年生</a></li>
  <li><a href="/mathLearningSite/explanations.php">中学３年生</a></li>
</ul>

<h3 class="sub-title">テスト</h3>
<ul class="sub-menu">
  <li><a href="/mathLearningSite/underConstruction.php">中学１年生</a></li>
  <li><a href="/mathLearningSite/underConstruction.php">中学２年生</a></li>
  <li><a href="/mathLearningSite/underConstruction.php">中学３年生</a></li>
  <li><a href="/mathLearningSite/underConstruction.php">中学総合問題</a></li>

</ul>

</body>
</html>
