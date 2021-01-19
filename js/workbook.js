function resize(Tarea){
	var areaH = Tarea.style.height;
	areaH = parseInt(areaH) - 54;
	if(areaH < 30){ areaH = 30; }
	Tarea.style.height = areaH + "px";
	Tarea.style.height = parseInt(Tarea.scrollHeight + 30) + "px";
}
// ドキュメント内の全てのテキストエリアを走査して高さ調整関数を適用します
onload = function(){
	var els = document.getElementsByTagName('textarea');
	for (var i = 0; i < els.length; i++){
		var obj = els[i];
		resize(obj);
		obj.onkeyup = function(){ resize(this); }
	}
}
