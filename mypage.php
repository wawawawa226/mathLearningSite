<?php
session_start();
require_once ('Common.php');

// ログイン状態のチェック
if(isset($_SESSION['id'])){
  // ログイン状態
  $userName = $_SESSION['name'];
  $dbh = db_connect();

  // 削除ボタンが押された際、そのメモを削除する
  if(isset($_POST['btn_delete'])){
    $res = $dbh->prepare('DELETE FROM memo WHERE memo_id = :id');
    $res->bindValue(':id',(int)$_POST['memo_id'],PDO::PARAM_INT);
    $res->execute();
    unset($_POST['memo_id']);
    unset($_POST['btn_delete']);
  }

  // 編集ボタンが押された際、そのメモを編集する
  if(isset($_POST['btn_edit'])){
    $res = $dbh->prepare('UPDATE memo SET memo = :memo WHERE memo_id = :id');
    $res->bindValue(':memo',(string)$_POST['memo'],PDO::PARAM_STR);
    $res->bindValue(':id',(int)$_POST['memo_id'],PDO::PARAM_INT);
    $res->execute();
    unset($_POST['memo_id']);
    unset($_POST['btn_edit']);
  }
  // メモを表示する
  $prepare = $dbh->prepare("SELECT * FROM memo WHERE user_id = :id ");
  $prepare->bindValue(':id',(int)$_SESSION['id'],PDO::PARAM_INT);
  $prepare->execute();
}else{
  // 未ログイン状態
  $userName = "ゲスト";
  $loginCheck = "false";
}


?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/master.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>マイページ</title>
  </head>
  <body>
    <header>
      <?php include __DIR__ . '/header.php';?>
    </header>

    <div class="mypage-contents wrapper">
      <main>
        <!-- エラーメッセージがある場合、上部に表示して破棄する -->
        <?php if( isset( $_SESSION['message'] ) ):?>
          <div class="container mb-5 border p-1">
            <div class="text-center">
              <?php echo $_SESSION['message'];?>
              <?php unset($_SESSION['message']);?>
            </div>
          </div>
        <?php endif;?>

        <!-- 未ログイン状態の場合、ゲストログインボタンを表示 -->
        <?php if( !isset( $_SESSION['id'] ) ): ?>
          <a class="btn btn-info btn-block mb-5" href="guest_login.php">ゲストログイン</a>
        <?php endif;?>

        <div class="tabs">

          <p class="tab tab-checked" id="tab-note"><i class="fas fa-book-open"></i> 学習ノート</p>
          <p class="tab" id="tab-info"><i class="fas fa-cog"></i> 会員情報</p>
        </div>

        <!-- 学習ノート表示部分 -->
        <div class="item tab-content tab-content-checked overflow-auto" id="content-note">
          <!-- ログイン済みの場合のみ、メモを表示する -->
        <?php if(isset($_SESSION['id'])):?>
          <!-- DBから取得したメモを全て取り出す -->
          <?php while($result = $prepare->fetch(PDO::FETCH_ASSOC)) { ?>
            <!-- 編集用に、メモ自体をボタンにしておく -->
            <div type="button" class="container shadow-sm mt-3 p-3 border" data-toggle="modal" data-target="#modal<?php echo $result['memo_id']; ?>">
              <?php echo $result['memo']; ?>
            </div>
            <!-- メモをクリックした際、モーダルでその内容を表示する -->
            <div class="modal fade" id="modal<?php echo $result['memo_id']; ?>" tabindex="-1"
              role="dialog" aria-labelledby="label<?php echo $result['memo_id']; ?>" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <!-- モーダル全体 -->
                <div class="modal-content">
                  <div class="modal-header">
                    <!-- モーダルのタイトルー -->
                    <h5 class="modal-title" id="label<?php echo $result['memo_id']; ?>">編集</h5>
                    <!-- 閉じるボタン -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <!-- モーダルのbody メモ内容を表示する -->
                  <form class="" action="" method="post">
                  <div class="modal-body">
                    <!-- 編集するためにテキストエリアにメモ内容を表示する -->
                    <textarea class="w-100 h-50 form-control" name="memo" rows="8" cols="50"><?php echo $result['memo']; ?></textarea>
                  </div>
                  <!-- モーダルのfooter 編集ボタンと削除ボタンを設置 -->
                  <div class="modal-footer">
                    <input type="hidden" name="memo_id" value="<?php echo $result['memo_id'];?>">
                    <button type="submit" name="btn_edit" class="btn btn-success">編集</button>
                    <button type="submit" name="btn_delete" class="btn btn-danger">削除</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- 未ログイン状態の時、メモの代わりにメッセージを出力 -->
        <?php else:?>
          <p class="content-none"><i class="fas fa-book-open"></i> ログインするとノートを保存できます。</p>

        <?php endif;?>
        </div>

        <div class="item tab-content container shadow-sm mt-3 p-3 border h-auto" id="content-info">

          <div class="container shadow-sm border p-3">
            ニックネーム：<?php echo $userName; ?>
          </div>

          <div class="container shadow-sm mt-3 p-3 border p-3">
            メールアドレス：<?php echo "aiueo@hoge.hg";?>
          </div>

          <div class="container shadow-sm mt-3 p-3 border p-3">
            数学は：<?php echo "好き"?>
          </div>

          <div class="container shadow-sm mt-3 p-3 border p-3">
            数学は：<?php echo "得意"?>
          </div>

          <div class="container shadow-sm mt-3 p-3 border p-3">
            部活：<?php echo "科学部"?>
          </div>

          <a class="btn btn-success mt-3" href="user_edit.php">会員情報の変更</a>
          <a class="btn btn-danger mt-3" href="logout.php">ログアウト</a>
        </div>


      </main>

      <aside>
        <?php include __DIR__ . '/sidebar.php';?>
      </aside>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/workbook.js"></script>
    <script src="js/mypage.js"></script>
  </body>
</html>
