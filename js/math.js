// 対義語関数の定義
var rev = (number,moto,taigi) =>{
  var text = $('#rev'+number).text();
  $('#rev'+number).toggleClass("btn-danger");
  if(text== moto ){
    $('#rev'+number).text(taigi);
  }else{
    $('#rev'+number).text(moto);
  }
};
// 対義語関数
$('#rev1').click(function(){
  rev(1,"北","南");
});

$('#rev2').click(function(){
  rev(2,"進んだ","戻った");
});

$('#rev3').click(function(){
  rev(3,"多い","少ない");
});

$('#rev4').click(function(){
  rev(4,"収入","支出");
});
// ここまで対義語

$('#a1').click(function(){
  $('#w1').text("-3").css('color','red');
});

$('#a2').click(function(){
  $('#w2').text("少ない").css('color','red');
});

$('#a3').click(function(){
  $('#w3').text("収入").css('color','red');
});

// 答えチェック関数の定義
var check = (number,kotae) =>{
  if($('#answer'+number).val()== kotae){
    $('#eva'+number).text('正解です').css('color','blue');
  }else{
    $('#eva'+number).text('正解は'+kotae+'です').css('color','red');
  }
};

// 答えチェック関数の実行
$('#kaito1').click(function(){
check(1,"自然数");
});

$('#kaito2').click(function(){
check(2,"絶対値");
});
