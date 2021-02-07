<?php
require_once ('ExplanationsClass.php');
//                 単元名,          画像,                  URL
$seifu = new Exp('正負の数','images/seifu.jpeg',' explanations/Seifu.php');
$moji = new Exp('文字式','images/seifu.jpeg',' explanations/Seifu.php');
$hoteishiki = new Exp('方程式','images/seifu.jpeg',' explanations/Seifu.php');
$kansu = new Exp('関数','images/seifu.jpeg',' explanations/Seifu.php');
$heimen = new Exp('平面図系','images/seifu.jpeg',' explanations/Seifu.php');
$kukan = new Exp('空間図形','images/seifu.jpeg',' explanations/Seifu.php');
$shiryo = new Exp('資料の整理','images/seifu.jpeg',' explanations/Seifu.php');

$mathUnits = array($seifu,$moji,$hoteishiki,$kansu,$heimen,$kukan,$shiryo);
?>
