<?php
require_once dirname(__FILE__) .'/ExplanationsClass.php';
//                 単元名,          画像,                  URL
$seifu = new Exp('正負の数','/images/seifu.jpeg',' /Explanations/Article/Seifu.php');
$moji = new Exp('文字式','/images/moji.jpeg',' /Explanations/Article/Seifu.php');
$hoteishiki = new Exp('方程式','/images/hoteishiki.jpeg',' /Explanations/Article/Seifu.php');
$kansu = new Exp('関数','/images/kansu.jpeg',' /Explanations/Article/Seifu.php');
$heimen = new Exp('平面図系','/images/heimen.jpeg',' /Explanations/Article/Seifu.php');
$kukan = new Exp('空間図形','/images/kukan.jpeg',' /Explanations/Article/Seifu.php');
$shiryo = new Exp('資料の整理','/images/shiryo.jpeg',' /Explanations/Article/Seifu.php');

$mathUnits = array($seifu,$moji,$hoteishiki,$kansu,$heimen,$kukan,$shiryo);
?>
