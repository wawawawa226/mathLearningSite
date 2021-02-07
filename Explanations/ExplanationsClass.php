<?php
class Exp{
  public $unitName;
  public $image;
  public $url;
  public function __construct($unitName,$image,$url){
    $this -> unitName = $unitName;
    $this -> image = $image;
    $this -> url = $url;
  }
}

?>
