<?php
require_once 'Common.php';
session_start();
// 管理者でない場合、ページを表示できないようにする
if(!isset($_SESSION['id']) || ($_SESSION['id'] !== 79)){
  $_SESSION['message'] = "このページは管理者専用です。" ;
  header("Location:" . $url_mypage );
  exit();
}

$page_flag = 0;
$clean = array();
$error = array();
$work = "";
$answer = "";
$work_level = "";
$unit = "";
if(isset($_GET['id'])){
  $id = $_GET['id'];
}else{
  $id = 0;
}

// サニタイズ
if( !empty($_POST) ) {
  foreach( $_POST as $key => $value ) {
    $clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
  }
}

if(isset($clean["work"])){$work = $clean["work"];}
if(isset($clean["work_answer"])){$answer = $clean["work_answer"];}
if(isset($clean["work_level"])){$work_level = $clean["work_level"];}
if(isset($clean["unit"])){$unit = $clean["unit"];}

if( !empty($clean['btn_confirm'])) {
  // 登録確認
  $page_flag = 0;
  $error = validation($clean);
  if( empty($error) ) {
     $page_flag = 1;
   }

} elseif( !empty($clean['btn_submit']) && $id == "") {
   // 登録完了
  $page_flag = 2;
  $dbh = db_connect();
  $data = $dbh->prepare('INSERT INTO work_book(work,work_answer,work_level,unit)
                          VALUES (:work,:answer,:work_level,:unit)');

  $data->bindValue(':work',(string)$work,PDO::PARAM_STR);
  $data->bindValue(':answer',(string)$answer,PDO::PARAM_STR);
  $data->bindValue(':work_level',(int)$work_level,PDO::PARAM_INT);
  $data->bindValue(':unit',(string)$unit,PDO::PARAM_STR);
  $data->execute();
}

function validation($vali) {
  $error = array();
  // 問題のバリデーション
  if( empty($vali['work']) ) {
  $error[] = "「問題」は必ず入力してください。";
  }

  if( empty($vali['work_answer']) ) {
  $error[] = "「解答」は必ず入力してください。";
  }

  if( empty($vali['work_level']) ) {
  $error[] = "「難易度」は必ず入力してください。";
  }

  return $error;
}

?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/master.css">
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/workbook.js"></script>
    <title>問題登録画面</title>
  </head>
  <body style="margin:10%;">
    <!-- 登録確認 -->
  <?php if( $page_flag === 1 ): ?>
    <p>問題文：<?php echo $work;?></p>
    <p>解答：<?php echo $answer;?></p>
    <p>難易度:<?php echo $work_level."(".$work_levels[$work_level].")"?></p>
    <p>単元:<?php echo $unit;?></p>

  <form action="workbook.php" method="post" id="sign_up" name="su">
      <input type="hidden" name="work" value="<?php echo $work;?>">
      <input type="hidden" name="work_answer" value="<?php echo $answer;?>">
      <input type="hidden" name="work_level" value="<?php echo $work_level;?>">
      <input type="hidden" name="unit" value="<?php echo $unit;?>">
  <div class="form-droup">
    <button value="送信" name="btn_back" class="btn btn-danger mb-2">修正する</button>
  </div>
  <div class="form-droup">
    <button value="送信" name="btn_submit" class="btn btn-primary mb-2">登録する</button>
  </div>

  </form>

  <?php elseif( $page_flag === 2 ): ?>
    <!-- 登録完了 -->
    <p>登録が完了しました。</p><br>
    <a class="btn btn-success" href="workbook.php" role="button">新規作成</a>
    <a class="btn btn-primary" href="workbook-list.php" role="button">問題一覧</a>
  <?php else: ?>
    <!-- 問題登録画面 -->
    <?php if( !empty($error) ): ?>
	     <ul class="error_list">
	     <?php foreach( $error as $value ): ?>
		     <li><?php echo $value; ?></li>
	      <?php endforeach; ?>
	     </ul>
    <?php endif; ?>
    <form action="workbook.php" method="post" id="sign_up" name="su">
      <h3>問題登録画面</h3>

      <div class="form-group">
        <label for="work">問題文</label>
        <textarea class="form-control" name="work" id="work" placeholder="問題文を入力"><?php if(isset($work)){echo $work;}?></textarea>
      </div>

      <div class="form-group">
            <label for="work_answer">解答</label>
            <textarea class="form-control" name="work_answer" id="work_answer" placeholder="解答を入力"><?php if(isset($answer)){echo $answer;}?></textarea>
          </div>

          <div class="form-group">
            <label class="control-label">難易度</label><br>
          <?php
          foreach ($work_levels as $key => $val) {
            $check = "";
            if($key == $work_level){
              $check = 'checked' ;
            }
          echo '<div class="form-check-inline">';
          echo "<input class=\"form-check-input\" type=\"radio\" name=\"work_level\" id=\"level".$key."\" value=\"".$key."\"".$check.">";
          echo "<label class=\"form-check-label\" for=\"level".$key."\">".$val."</label>";
          echo '</div>';
        }
          echo '</div>';
        ?>

        <div class="form-group">
          <label class="control-label">単元</label>
            <select class="form-control" name="unit" id="unit">
              <?php
              foreach($units as $val){
                 $check = "";
                 if($val == $unit){
                   $check = 'selected';
                 }
                echo "<option value=\"" .$val. "\"" .$check.">".$val."</option>";
              }
              ?>
            </select>
          </div>

        <div class="form-droup">
      <button value="送信" name="btn_confirm" class="btn btn-primary mb-2">登録する</button>
        </div>

    </form>
<?php endif; ?>
</body>
</html>
