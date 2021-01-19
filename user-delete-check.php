<?php
  require_once ('Common.php');
  $id = $_GET['id'];
  $dbh = db_connect();
  $res = $dbh->prepare('SELECT * FROM user_info WHERE user_id = :id');
  $res->bindValue(':id',(int)$id,PDO::PARAM_INT);
  $res->execute();
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="css/list-user.css">
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/workbook.js"></script>
    <title>ユーザー削除確認画面</title>
  </head>
  <body style="margin:5%;">
    このデータを本当に削除しますか？
    <?php
      echo "<a class=\"btn btn-danger\" href=\"user-delete-done.php?id=".$id."\" role=\"button\">はい</a>" ;
      echo "<a class=\"btn btn-primary\" href=\"user-list.php\" role=\"button\">いいえ</a>";
    ?>

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
  </body>
</html>
