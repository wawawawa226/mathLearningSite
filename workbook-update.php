<?php
  require_once 'Common.php';
  $page_flag = 0;
  $clean = array();
  $error = array();
  $work = "";
  $answer = "";
  $work_level = "";
  $unit = "";
  $dbh = db_connect();
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }else{
    $id = 0;
  }

  if( !empty($_POST) ) {
    foreach( $_POST as $key => $value ) {
      $clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
    }
  }

  if(isset($clean["work"])){$work = $clean["work"];}
  if(isset($clean["work_answer"])){$answer = $clean["work_answer"];}
  if(isset($clean["work_level"])){$work_level = $clean["work_level"];}
  if(isset($clean["unit"])){$unit = $clean["unit"];}

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

  if( (empty($clean['btn_update_check'])) && ($id !== 0) && (empty($clean['btn_update_done']))) {
    // 更新登録画面
    echo "pege3";
    $page_flag = 3;
    $res = $dbh->prepare('SELECT * FROM work_book WHERE work_number = :id');
    $res->bindValue(':id',(int)$id,PDO::PARAM_INT);
    $res->execute();
    $data = $res->fetch(PDO::FETCH_ASSOC);
    print_r($data);

    $work = $data['work'];
    $answer = $data['work_answer'];
    $work_level = $data['work_level'];
    $unit = $data['unit'];

  }elseif( !empty($clean['btn_update_check']) && $id !== 0) {
    // 更新確認
    $page_flag = 4;

  }elseif( !empty($clean['btn_update_done']) && $id !== 0) {
    // 更新完了
    $page_flag = 5;
    $prepare = $dbh->prepare('UPDATE work_book
                           SET work = :work , work_answer = :answer, work_level = :work_level, unit = :unit
                           WHERE work_number = :id');

    $prepare->bindValue(':work',(string)$work,PDO::PARAM_STR);
    $prepare->bindValue(':answer',(string)$answer,PDO::PARAM_STR);
    $prepare->bindValue(':work_level',(int)$work_level,PDO::PARAM_INT);
    $prepare->bindValue(':unit',(string)$unit,PDO::PARAM_STR);
    $prepare->bindValue(':id',(int)$id,PDO::PARAM_INT);
    $prepare->execute();
    $data = $prepare->fetch(PDO::FETCH_ASSOC);

  }
  echo "flag is...".$page_flag;
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

<?php if( $page_flag === 3 ): ?>

  <form action="workbook-update.php?id=<?php echo $id ?>" method="post" id="sign_up" name="su">
    <h3>問題編集画面</h3>

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
        <button value="送信"  name="btn_update_check" class="btn btn-primary mb-2">登録する</button>
      </div>

    </form>

  <?php elseif( $page_flag === 4 ): ?>
    <!-- 編集確認画面 -->
    <p>問題文：<?php echo $work;?></p>
    <p>解答:<?php echo $answer;?></p>
    <p>難易度:
      <?php
      echo $work_level;
      echo "(";
      switch ($work_level) {
        case 1:
          echo "簡単";
          break;
        case 2:
          echo "やや簡単";
          break;
        case 3:
          echo "普通";
          break;
        case 4:
          echo "やや難しい";
          break;
        case 5:
          echo "難しい";
          break;
      }
      echo ")";
      ?>
    </p>
    <p>単元:<?php echo $unit;?></p>

  <form action="workbook-update.php?id=<?php echo $id ?>" method="post" id="sign_up" name="su">
      <input type="hidden" name="work" value="<?php echo $work;?>">
      <input type="hidden" name="work_answer" value="<?php echo $answer;?>">
      <input type="hidden" name="work_level" value="<?php echo $work_level;?>">
      <input type="hidden" name="unit" value="<?php echo $unit;?>">
      <div class="form-droup">
        <input type="button" onclick="history.back()" value="戻る">
      </div>
      <div class="form-droup">
        <button value="送信" name="btn_update_done" class="btn btn-primary mb-2">更新する</button>
      </div>
    </form>

  <?php elseif( $page_flag === 5 ): ?>
    <!-- 更新完了 -->
    <p>更新が完了しました。</p><br>
    <a class="btn btn-success" href="workbook.php" role="button">新規作成</a>
    <a class="btn btn-primary" href="workbook-list.php" role="button">問題集一覧</a>

  <?php endif; ?>
  </body>
  </html>
