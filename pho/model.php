<?
  class Model{
    public $var1 = "test";

    public static function new_(){
      foreach($this as $key => $value){
        var_dump("$key=>$value");
      }  
    }

    function save(){
    }
  }
?>
