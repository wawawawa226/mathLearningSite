$(function() {
  $("#save_memo").click(function(){
    aj();
  });

  var aj = () =>{
    var memo = $('#memo').val();

    // Ajax通信を開始
    $.ajax({
      url: '../memoAjax.php',
      type: 'POST',
      // フォーム要素の内容をハッシュ形式に変換
      data: {
        memo:memo,
      },
      dataType : "json"
    })
    .done(function(data) {
        // 通信成功時の処理を記述
        console.log("成功しました");
        console.log(data);
      })
      .fail(function() {
        // 通信失敗時の処理を記述
        alert("失敗しました");
      });
    }

});
