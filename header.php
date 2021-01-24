<?php
$loginCheck = "";
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
  <a href="mypage.php">数学学習サイト</a>
</h1>
<?php
if(isset($_SESSION['name'])){
  $userName = $_SESSION['name'];
}else{
    $userName = "ゲスト";
    $loginCheck = "none";
  }

if($loginCheck == "none"){
// ログインしていない場合、ログインリンクを設置
// echo"<br><a class=\"btn btn-success\" href=\"login-form.php\" role=\"button\">ログイン</a>";
echo"<a href=\"login-form.php\">ログイン/新規登録（無料）</a>";
}else{
// ログインしている場合
// echo "<br><a class=\"btn btn-success\" href=\"logout.php\" role=\"button\">ログアウト</a>";
echo
"<div class=\"greet\">".
"<p>こんにちは！".$userName."さん</p>".
"</div>";

}


?>
</div>
<nav>
  <ul>
    <li><a href="mypage.php">マイページ</a></li>
    <!-- <li><a href="mypage.php">問題一覧</a></li> -->
    <li><a href="workbook-list.php">問題一覧</a></li>
    <!-- <li><a href="mypage.php">テストを受ける</a></li> -->
    <li><a href="answer.php">テストを受ける</a></li>
  </ul>
</nav>

</body>
</html>
