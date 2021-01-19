<?php
  session_start();
  $levels = array(1=>"簡単",2=>"やや簡単",3=>"普通",4=>"やや難しい",5=>"難しい");
  $units = array("正負の数","文字式","方程式","関数","平面図形","空間図形","資料の整理");
  if(isset($_SESSION["NAME"])){
    $userName = $_SESSION['NAME'];
  }else{
      $userName = "ゲスト";
      $loginCheck = "none";
    }

  $works = array("問題0", "問題1", "問題2", "問題3");
  $key = array_rand($works, 1);

?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/answer.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/workbook.js"></script>
    <script src="js/answer.js"></script>
    <title>ランダムテスト</title>
  </head>
  <body>
    <header>
      <?php include __DIR__ . '/header.php';?>
    </header>
    <div class="mypage-contents wrapper">
    <main>
  <h2>総合ランダムテスト</h2>
  <div class="item">
    <p>難易度と単元を選択して「問題を表示する」を押すと、問題がランダムで出題されます。</p>
    <p>一度問題を表示した後は「問題を変更する」を押すと別の問題に変更することができます。</p>
  </div>

      <form action="answer.php" method="post" id="sign_up" name="su">
      <hr>
      <label class="control-label">難易度を選択してください</label>
      <div class="form-group buttons">
      <?php
      foreach ($levels as $key => $val) {
        $check = "";
        if($key === 1){
          $check = 'checked' ;
        }
      echo '<div class="form-check-inline">';
      echo "<input class=\"form-check-input\" type=\"radio\" name=\"level\" id=\"level".$key."\" value=\"".$key."\"".$check.">";
      echo "<label class=\"form-check-label\" for=\"level".$key."\">".$val."</label>";
      echo '</div>';
    }
      echo '</div>';
    ?>
    <hr>
    <div class="form-group">
      <label class="control-label">単元を選択してください</label>
        <select class="form-control short-form" name="unit" id="unit">
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

      <hr>

      <div class="form-droup">
    <button type="button" id="workDisplay" name="btn_confirm" class="" style="margin:2em 0em;">問題を表示する</button>
      </div>
      <hr>
    <div id="question">
      <div class="form-group">
        <label class="control-label" for="work">問題</label>
        <textarea class="form-control" name="work" id="work" readonly></textarea>
      </div>

      <input type="hidden" id= "work_number" name="work_number" value="">
      <hr>
      <div class="form-group">
        <label class="control-label" for="work_answer">解答</label>
        <textarea class="form-control" name="work_answer" id="work_answer" placeholder="解答を入力"></textarea>
      </div>
    <div class="form-droup">
  <button type="button" id="answer" name="btn_confirm" class="btn btn-outline-info btn-lg" style="margin:2em 0em;">回答する</button>
    </div>
  </div>

</form>
</main>

<aside>
  <?php include __DIR__ . '/sidebar.php';?>
</aside>

  </div>

  <footer>
    <?php include __DIR__ . '/footer.php';?>
  </footer>
</body>
</html>
