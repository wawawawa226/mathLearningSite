<?php
  session_start();
  require_once ('Common.php');
  if(isset($_SESSION['id'])){
    $_SESSION['message'] = "既にログインしています。";
    header("Location:" . $url_mypage );
    exit();
  }
  $data = array("user_name"=>"",
                "mail"=>"",
                "age"=>"",
                "club"=>"",
                "math_lev"=>"",
                "math_like"=>"",
              );

  // SESSSIONに値が入っている場合、つまりsignup-checkから戻ってきた場合、値の保持のため$dataに代入する
  if(isset($_SESSION['name'])){
    $data["user_name"] = $_SESSION['name'];
  }

  if(isset($_SESSION['email'])){
    $data["mail"] = $_SESSION['email'];
  }

  if(isset($_SESSION['age'])){
    $data["age"] = $_SESSION['age'];
  }

  if(isset($_SESSION['club'])){
    $data["club"] = $_SESSION['club'];
  }

  if(isset($_SESSION['math-level'])){
    $data["math_lev"] = $_SESSION['math-level'];
  }else{
    // 初期値を代入しておく
    $data["math_lev"] = "得意";
  }

  if(isset($_SESSION['math-like'])){
    $data["math_like"] = $_SESSION['math-like'];
  }else{
    // 初期値を代入しておく
    $data["math_like"] = "好き";
  }

// 三角！マークのアイコン
$caution ="<i class=\"fas fa-exclamation-triangle\"></i>";

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
    <link href="css/signup.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>登録画面</title>
  </head>
  <body>
      <header>
        <?php include __DIR__ . '/header.php';?>
      </header>
    <div class="form-box container">
      <form action="math-signup-check.php" method="post" id="sign_up" name="su">
        <h3>登録</h3>
        <p>すでにアカウントをお持ちですか？ <a href="login-form.php">ログイン<i class="fas fa-angle-double-right"></i></a></p>
        <?php
        // エラーメッセージがある場合、それを表示する。
        // 名前のエラー
          if(isset($_SESSION["nameOverlapping"])){
            echo $_SESSION["nameOverlapping"];
            $_SESSION["nameOverlapping"] = "";
          }
          // メールのエラー
          if(isset($_SESSION["mailOverlapping"])){
            echo $_SESSION["mailOverlapping"];
            $_SESSION["nameOverlapping"] = "";
          }
          ?>
        <div class="form-group">
          <label class="control-label" for="name">ニックネーム (必須)</label>
          <input type="text" name="name" class="form-control" id="name" value="<?php echo $data["user_name"]; ?>">
          <div class="error" id="error_name" style="display:none;"><?php echo $caution;?>名前が入力されていません</div>
        </div>

        <div class="form-group">
          <label class="control-label" for="email">メールアドレス (必須)</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $data["mail"]; ?>">
          <div class="error" id="error_mail" style="display:none;"><?php echo $caution;?>メールアドレスが入力されていません</div>
        </div>

        <div class="form-group">
          <label class="control-label" for="pass1">パスワード (必須)</label>
          <input type="password" class="form-control" id="pass1" name="pass1" maxlength="10">
          <div class="error" id="error_pass" style="display:none;"><?php echo $caution;?>パスワードが入力されていません</div>
        </div>

        <div class="form-group">
          <label class="control-label" for="pass2">確認のためもう一度入力してください (必須)</label>
          <input type="password" class="form-control" id="pass2" name="pass2" maxlength="10">
          <div class="error" id="error_pass2" style="display:none;"><?php echo $caution;?>パスワードが一致していません</div>
        </div>

        <div class="form-group">
          <label class="control-label">学年を教えてください。(必須)</label>
          <select class="form-control" name="age" id="age">
          <?php foreach($ages as $age){
            $check = "";
            if($age == $data['age']){
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
            if($level == $data['math_lev']){
              $check = 'checked' ;
            }
            echo '<div class="form-check-inline">';
            echo "<input class=\"form-check-input\" type=\"radio\" name=\"math-level\" id=\"level".$key."\" value=\"".$level."\"".$check.">";
            echo "<label class=\"form-check-label\" for=\"level".$key."\">".$level."</label>";
            echo '</div>';
          }
          echo '</div>';
          ?>


        <div class="form-group">
          <label class="control-label">数学は好きですか？ (必須)</label><br>
          <?php foreach ($likes as $key => $val) {
            $check = "";
            if($val == $data['math_like']){
              $check = 'checked' ;
            }
            echo '<div class="form-check-inline">';
            echo "<input class=\"form-check-input\" type=\"radio\" name=\"math-like\" id=\"like".$key."\" value=\"".$val."\"".$check.">";
            echo "<label class=\"form-check-label\" for=\"like".$key."\">".$val."</label>";
            echo '</div>';
          }
          echo '</div>';
          ?>

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
            ?>
        </div>

        <div class="form-group">
          <select class="form-control" name="clubSports" id="clubSports" style="<?php if($type !== "sports"){echo "display:none;";} ?>">
            <option value="error">選択してください</option>
            <?php foreach($sports as $val){
              $check = "";
              if($val == $data[club]){
                $check = 'selected';
              }
              echo "<option value=\"" .$val. "\"" .$check.">".$val."</option>";
            }
            ?>
          </select>
          <div class="error" id="error_sports" style="display:none;"><?php echo $caution;?>部活が選択されていません</div>
        </div>

        <div class="form-group">
          <select class="form-control" name="clubCultures" id="clubCultures" style="<?php if($type !== "cultures"){echo "display:none;";} ?>">
            <option value="error">選択してください</option>
            <?php foreach($cultures as $val){
              $check = "";
              if($val == $data[club]){
                $check = 'selected';
              }
              echo "<option value=\"" .$val. "\"" .$check.">".$val."</option>";
            }
            ?>
          </select>
          <div class="error" id="error_cultures" style="display:none;"><?php echo $caution;?>部活が選択されていません</div>
        </div>

        <div class="form-group">
          <select class="form-control" name="clubNone" id="clubNone" style="<?php if($type !== "none"){echo "display:none;";} ?>">
            <option value="無所属">無所属</option>
          </select>
        </div>

        <div class="form-group">
          <button value="送信" class="btn btn-info btn-block submit_button">登録する</button>
        </div>

      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/math-sign-up.js"></script>
  </body>
</html>
