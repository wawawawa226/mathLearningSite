<?php
require_once ('Common.php');
session_start();
$check_data_mail = "";
// nameが空でない、つまり正規のルートでアクセスされた場合に登録処理を行う。
if(!isset($_POST["name"]) && isset($_SESSION['id']) ){
  $dbh = db_connect();
  $data = $dbh->prepare('UPDATE user_info
                            SET user_name = :userName, mail = :email, age = :age,
                                math_lev = :mathLevel, math_like = :mathLike, club = :club
                            WHERE user_id = :id');
  $data->bindValue(':userName',(string)$_POST["name"],PDO::PARAM_STR);
  $data->bindValue(':email',(string)$_POST["email"],PDO::PARAM_STR);
  $data->bindValue(':age',(string)$_POST["age"],PDO::PARAM_STR);
  $data->bindValue(':mathLevel',(string)$_POST["math-level"],PDO::PARAM_STR);
  $data->bindValue(':mathLike',(string)$_POST["math-like"],PDO::PARAM_STR);
  $data->bindValue(':club',(string)$_POST["club"],PDO::PARAM_STR);
  $data->bindValue(':id',(int)$_SESSION['id'],PDO::PARAM_INT);
  $data->execute();
  //session変数を置き換える
  $_SESSION = array();
  $_SESSION['name'] = $_POST["name"];
  $_SESSION['id'] = $data['user_id'];
  $_SESSION['age'] = $_POST["age"];
  $_SESSION['math_lev'] = $_POST["math-level"];
  $_SESSION['math_like'] = $_POST["math-like"];
  $_SESSION['club'] = $_POST["club"];
  $judge = "完了" ;
  $pageFlag = 0 ;
}else{
  // エラーが発生した場合
  $pageFlag = 1 ;
  $judge = "失敗" ;
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
    <title>更新<?php echo $judge;?> </title>
  </head>
  <body>
<!-- データ登録が完了したとき -->
    <?php if ($pageFlag === 0): ?>

    <header>
      <?php include __DIR__ . '/header.php';?>
    </header>

    <div class="mypage-contents wrapper">
      <main>
        <h3>更新が完了しました</h3>
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

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/math-sign-up.js"></script>
  </body>
</html>
