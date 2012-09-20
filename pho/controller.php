<?
  class Controller{

    private static function availaible_functions(){
      return get_class_methods(get_called_class());
    }

    private static function request_is_an_availaible_function($request){
      return in_array($request,self::availaible_functions()) && !Controller::function_belongs_to_controller($request);
    }

    private static function function_belongs_to_controller($function_name){
      return in_array($function_name,Controller::availaible_functions());
    }

    public static function respond_to_request($request){
      if(self::request_is_an_availaible_function($request)){
        if($request=="new"){$request="new_";}
        static::$request();
      }else{
        if(is_numeric($request)){
          static::show($request);
        }else{
          Pho::not_found();
        }
      }
    }
  }
?>
