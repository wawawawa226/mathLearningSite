$(function() {
 var $answer = "a1";
  $("#workDisplay").click(function(){
    $("#workDisplay").fadeOut();
    // $("#workDisplay").removeClass("btn-primary");
    // $("#workDisplay").addClass("btn-info");
    $("#workDisplay").html("問題を変更する");
    $("#workDisplay").fadeIn();
    aj();
  });

  $("#answer").click(function(){
    var $user_answer = $("#work_answer").val();
    if( $answer == $user_answer){
      alert("正解です");
    }else{
      alert("不正解です。\n正解は"+$answer+"です。");
    }
  });

  var aj = () =>{
    var level = $('input[name=level]:checked').val();
    var unit = $("#unit").val();
    var work_number = $("#work_number").val();

    // Ajax通信を開始
    $.ajax({
      url: 'WorkAjax.php',
      type: 'POST',
      // フォーム要素の内容をハッシュ形式に変換
      data: {
        work_number:work_number,
        level: level,
        unit: unit
      },
      dataType : "json"
    })
    .done(function(data) {
        // 通信成功時の処理を記述
        $("#work").html(data["work"]);
        $('#work_number').val(data["work_number"]);
        $answer = data["work_answer"] ;
        console.log(data.length);
        console.log(data);
      })
      .fail(function() {
        // 通信失敗時の処理を記述
        alert("失敗しました");
      });
    }

});
