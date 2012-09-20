<?
  class Controller{

    public static function availaible_functions(){
      return array("index","new","create","update","destroy");
    }

    public function request_is_an_availaible_function($request){
      return in_array($request,self::availaible_functions());
    }

    public static function respond_to_request($request){
      if(self::request_is_an_availaible_function($request)){
        if($request=="new"){$request="new_";}
        static::$request();
      }else{
        $id = intval($request);
        if($id!=0){
          static::show($id);
        }else{
          Pho::not_found();
        }
      }
    }
    public function index(){Pho::not_found();}
    public function show(){Pho::not_found();}
    public function new_(){Pho::not_found();}
    public function create(){Pho::not_found();}
    public function update(){Pho::not_found();}
    public function destroy(){Pho::not_found();}
  }
?>
