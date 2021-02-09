<?php
require_once dirname(__FILE__) . '/../../Commons/Common.php';
session_start();
if(isset($_SESSION['id'])){
  $_SESSION['user_delete_id'] = $_SESSION['id'];
  $dbh = db_connect();
  $res = $dbh->prepare('SELECT * FROM user_info WHERE user_id = :id');
  $res->bindValue(':id',(int)$_SESSION['id'],PDO::PARAM_INT);
  $res->execute();
}else{
  header("Location:" . $url_mypage );
  exit();
}
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/list.css">
    <link rel="stylesheet" href="/css/list-user.css">
    <title>ユーザー削除確認画面</title>
  </head>
  <body style="margin:5%;">
    このデータを本当に削除しますか？

  <a class="btn btn-danger" href="UserDeleteDone.php" role="button">はい</a>
  <a class="btn btn-primary" href="/User/Mypage.php" role="button">いいえ</a>


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
    $data = $res->fetch(PDO::FETCH_ASSOC);
    ?>
    <tr>
    <td><?php echo $data["user_id"] ?> </td>
    <td><?php echo $data["user_name"] ?> </td>
    <td><?php echo $data["mail"] ?> </td>
    <td><?php echo $data["age"] ?> </td>
    <td><?php echo $data["math_lev"] ?> </td>
    <td><?php echo $data["math_like"] ?> </td>
    <td><?php echo $data["club"] ?> </td>
    <td><?php echo $data["in_date"] ?> </td>
    <td><?php echo $data["up_date"] ?> </td>
    </tr>


    </table>
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/workbook.js"></script>
  </body>
</html>
