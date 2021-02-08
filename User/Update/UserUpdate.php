<?php
require_once dirname(__FILE__) . '/../../Commons/Common.php';
session_start();
if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
  $dbh = db_connect();
  $res = $dbh->prepare('SELECT * FROM user_info WHERE user_id = :id');
  $res->bindValue(':id',(int)$id,PDO::PARAM_INT);
  $res->execute();
  $data = $res->fetch(PDO::FETCH_ASSOC);
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
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/master.css">
    <link href="/css/signup.css" rel="stylesheet">
    <title>数学更新画面</title>
  </head>
  <body>
    <div class="signup-form-box">
      <form action="UserUpdateCheck.php" method="post" id="sign_up" name="su">
          <h3>更新画面</h3>

          <div class="form-group">
            <label class="control-label" for="name">ニックネーム (必須)</label>
              <input type="text" name="name" class="form-control" id="name" value="<?php echo $data["user_name"]; ?>">
              <div class="error" id="error_name" style="display:none;">名前が入力されていません</div>
          </div>

          <div class="form-group">
            <label class="control-label" for="email">メールアドレス (必須)</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $data["mail"]; ?>">
            <div class="error" id="error_mail" style="display:none;">メールアドレスが入力されていません</div>
          </div>

          <div class="form-group">
            <label class="control-label">学年を教えてください。 (必須)</label>
            <select class="form-control" name="age" id="age">
              <?php foreach($ages as $age){
                 $check = "";
                 if($age == $data["age"]){
                   $check = 'selected';
                 }
                echo "<option value=\"" .$age. "\"" .$check.">".$age."</option>";
              }
              ?>
            </select>
            <div class="error" id="error_age" style="display:none;">学年が選択されていません</div>
          </div>

        <div class="form-group">
          <label class="control-label">数学は得意ですか？ (必須)</label><br>
          <?php foreach ($levels as $key => $level) {
            $check = "";
            if($level == $data["math_lev"]){
              $check = 'checked' ;
            }
          echo '<div class="form-check-inline">';
          echo "<input class=\"form-check-input\" type=\"radio\" name=\"math-level\" id=\"level".$key."\" value=\"".$level."\"".$check.">";
          echo "<label class=\"form-check-label\" for=\"level".$key."\">".$level."</label>";
          echo '</div>';
        }
          echo '</div>';
        ?>
          <div class="error" id="error_level" style="display:none;">選択されていません</div>


        <div class="form-group">
          <label class="control-label">数学は好きですか？ (必須)</label><br>
          <?php foreach ($likes as $key => $val) {
            $check = "";
            if($val == $data["math_like"]){
              $check = 'checked' ;
            }
          echo '<div class="form-check-inline">';
          echo "<input class=\"form-check-input\" type=\"radio\" name=\"math-like\" id=\"like".$key."\" value=\"".$val."\"".$check.">";
          echo "<label class=\"form-check-label\" for=\"like".$key."\">".$val."</label>";
          echo '</div>';
          }
          echo '</div>';
          ?>
          <div class="error" id="error_like" style="display:none;">選択されていません</div>


        <div class="form-group">
          <label class="control-label">所属している部活を教えてください (必須)</label><br>
          <?php


            if(in_array($data["club"], $sports)){
              $type="sports";
            }elseif (in_array($data["club"], $cultures)) {
              $type="cultures";
            }else{
              $type="none";
            }
            foreach ($clubTypes as $key => $val) {
            $check = "";

              if($key == $type){
                $check = 'checked' ;
              }

          echo '<div class="form-check-inline">';
          echo "<input class=\"form-check-input\" type=\"radio\" name=\"clubType\" id=\"".$key."\" value=\"".$val."\"".$check.">";
          echo "<label class=\"form-check-label\" for=\"".$key."\">".$val."</label>";
          echo '</div>';
          }
          echo '</div>';
          ?>

        <div class="form-group">
          <select class="form-control" name="clubSports" id="clubSports" style="<?php if($type !== "sports"){echo "display:none;";} ?>">
            <option value="error">選択してください</option>
            <?php foreach($sports as $val){
               $check = "";
               if($val == $data["club"]){
                 $check = 'selected';
               }
              echo "<option value=\"" .$val. "\"" .$check.">".$val."</option>";
            }
            ?>
          </select>
          <div class="error" id="error_sports" style="display:none;">部活が選択されていません</div>
        </div>

        <div class="form-group">
          <select class="form-control" name="clubCultures" id="clubCultures" style="<?php if($type !== "cultures"){echo "display:none;";} ?>">
            <option value="error">選択してください</option>
            <?php foreach($cultures as $val){
               $check = "";
               if($val == $data["club"]){
                 $check = 'selected';
               }
              echo "<option value=\"" .$val. "\"" .$check.">".$val."</option>";
            }
            ?>
          </select>
          <div class="error" id="error_cultures" style="display:none;">部活が選択されていません</div>
        </div>

        <div class="form-group">
          <select class="form-control" name="clubNone" id="clubNone" style="<?php if($type !== "none"){echo "display:none;";} ?>">

            <option value="無所属">無所属</option>
          </select>
        </div>

        <div class="form-droup">
      <button value="送信" class="btn btn-primary mb-2 submit_button">更新する</button>
        </div>

    </form>
  </div>
  <script src="/js/jquery-3.5.1.min.js"></script>
  <script src="/js/signup.js"></script>
</body>
</html>
