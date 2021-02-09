<?php
require_once dirname(__FILE__) . '/../Commons/Common.php';
session_start();
// 管理者でない場合、ページを表示できないようにする
if(!isset($_SESSION['id']) || ($_SESSION['id'] !== 79)){
  $_SESSION['message'] = "このページは管理者専用です。" ;
  header("Location:" . $url_mypage );
  exit();
}
$dbh = db_connect();
$prepare = $dbh->prepare('SELECT * FROM user_info');
// SQL分を実行
$prepare->execute();
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/list.css">
    <link rel="stylesheet" href="/css/list-user.css">
    <title>ユーザー一覧画面</title>
  </head>
  <body>
    <header>
      <?php include __DIR__ . '/../Commons/Header.php';?>
    </header>
    <div class="container">


    <table border="1">
    <tr>
      <th>ID</th>
      <th>名前</th>
      <th>メールアドレス</th>
      <th>学年</th>
      <th>レベル</th>
      <th>好み</th>
      <th>部活</th>
      <th>登録日</th>
      <th>更新日</th>
    </tr>
    <?php
    while($result = $prepare->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
      <td><?php echo $result["user_id"] ?> </td>
      <td><?php echo $result["user_name"] ?> </td>
      <td><?php echo $result["mail"] ?> </td>
      <td><?php echo $result["age"] ?> </td>
      <td><?php echo $result["math_lev"] ?> </td>
      <td><?php echo $result["math_like"] ?> </td>
      <td><?php echo $result["club"] ?> </td>
      <td><?php echo $result["in_date"] ?> </td>
      <td><?php echo $result["up_date"] ?> </td>
    </tr>
    <?php
    }
    ?>

    </table>
  </div>
  <script src="/js/jquery-3.5.1.min.js"></script>
  <script src="/js/workbook.js"></script>
  </body>
</html>
