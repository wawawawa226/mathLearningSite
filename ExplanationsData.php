<?php
require_once ('ExplanationsClass.php');
//                 単元名,          画像,                  URL
$seifu = new Exp('正負の数','images/seifu.jpeg',' explanations/seifu.php');
$moji = new Exp('文字式','images/seifu.jpeg',' explanations/seifu.php');
$hoteishiki = new Exp('方程式','images/seifu.jpeg',' explanations/seifu.php');
$kansu = new Exp('関数','images/seifu.jpeg',' explanations/seifu.php');
$heimen = new Exp('平面図系','images/seifu.jpeg',' explanations/seifu.php');
$kukan = new Exp('空間図形','images/seifu.jpeg',' explanations/seifu.php');
$shiryo = new Exp('資料の整理','images/seifu.jpeg',' explanations/seifu.php');

$mathUnits = array($seifu,$moji,$hoteishiki,$kansu,$heimen,$kukan,$shiryo);
?>
