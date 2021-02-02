var c = 0;

$(function() {
		$('#sports').click(function(){
			$("#clubSports").show();
			$("#clubCultures").hide();
			$("#clubNone").hide();
		});
		$('#cultures').click(function(){
			$("#clubSports").hide();
			$("#clubCultures").show();
			$("#clubNone").hide();
		});
		$('#none').click(function(){
			$("#clubSports").hide();
			$("#clubCultures").hide();
			$("#clubNone").show();
		});
	});

$(function() {
	$('[name=gender1]').change(function(){
		var a = $('[name=gender1]:checked').val();
		if(a === "unknown"){
			$("#reason1").show();
 		}else{
			$("#reason1").hide();
		}
	});
});

function check_pass2(){
	if ($("#pass1").val() != $("#pass2").val()){
		c = 1;
		$("#error_pass2").show();
	}else{
		$("#error_pass2").hide();
	}
}


var checkSub = (a,b) => {
	if ($('#'+a).val() == ""){
		c = 1;
		$('#'+b).show();
	}else{
		$('#'+b).hide();
	}
}

var checkSub2= (a,b) => {
	if ($('.'+a).val() == ""){
		c = 1;
		$('#'+b).show();
	}else{
		$('#'+b).hide();
	}
}

var checkSelect = (a,b) => {
	if ($('#'+a).val() == "error"){
		c = 1;
		$('#'+b).show();
	}else{
		$('#'+b).hide();
	}
}

var clubCheck = () =>{
	var a= $('[name=clubType]:checked').val();
	console.log(a);
	if(a=="運動部"){
		if($('#clubSports').val()=="error"){
			c = 1;
			$('#error_sports').show();
			$('#error_cultures').hide();
			console.log('運動エラー');
		}else{
			$('#error_sports').hide();
			$('#error_cultures').hide();
		}
	}else if(a=="文化部"){
		if($('#clubCultures').val()=="error"){
			c = 1;
			$('#error_cultures').show();
			$('#error_sports').hide();
			console.log('文化エラー');
		}else{
			$('#error_cultures').hide();
			$('#error_sports').hide();
		}
	}else{
		$('#error_cultures').hide();
		$('#error_sports').hide();
	}
}



$(function(){
	$("#sign_up").submit(function(){
	c = 0 ;
	checkSub("name","error_name");
	checkSub("email","error_mail");
	checkSub("tel","error_tel");
	checkSub("pass1","error_pass");
	check_pass2();//再入力したパスが一致しているか
	checkSelect("age","error_age");
	clubCheck();
	if (c == 1){  //ひとつでもエラーが起こった場合 c == 1　になる。
		alert('未入力または未選択の項目があります');
  	return false;    //送信ボタン本来の動作をキャンセルします
	}else{
		alert('登録します');
 		return true;    //送信ボタン本来の動作を実行します
		}
	});
});
