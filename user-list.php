<?php
  require_once ('Common.php');
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
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="css/list-user.css">
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/workbook.js"></script>
    <title>ユーザー一覧画面</title>
  </head>
  <body style="margin:5%;">
    <a class="btn btn-success" href="math-sign-up.php" role="button">新規登録</a>

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
      <th>操作</th>
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
    <td><?php echo "<a href=user-update.php?id=".$result["user_id"].">編集</a><br><a href=user-delete-check.php?id=".$result["user_id"].">削除</a>"?></td>
    </tr>
    <?php

    }
    ?>

    </table>
  </body>
</html>
