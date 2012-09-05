<?
  require_once("controller.php");

  function __autoload($class_name){
    if(!include('../controllers/' . $class_name . '.php')){
      if(!include('../models/' . $class_name . '.php')){
        throw Exception("The Class file wasn't found");
      }
    }
  }
?>
