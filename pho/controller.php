<?
  class Controller{

    public static function availaible_functions(){
      return array("index","show","new","create","update","destroy");
    }

    public function request_is_an_availaible_function($request){
      if($request==""){$request="index";}
      return in_array($request,self::availaible_functions());
    }

    public static function respond_to_request($request){
      if($this->request_is_a_default_function($request)){
        self::$request();
      }
    }
  }
?>
