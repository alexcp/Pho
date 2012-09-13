<?
require("config.php");

class Pho{
  public $resources;

  public function request(){
    return $_SERVER["REQUEST_URI"];
  }

  public function define_resources($resources){
    $this->resources = $resources;
  }

  public function run(){
    $this->send_to_controller($this->request());
  }

  public function uri_is_a_resource($uri){
    return in_array($uri[1],$this->resources);
  }

  public function split_uri($uri){
    return explode("/",$uri);
  }

  public function send_to_controller($uri){
    $uri = $this->split_uri($uri);
    if($this->uri_is_a_resource($uri)){
      $controller = $uri[1] . "_controller";
      if($uri[2]==NULL){$uri[2]="index";}
      $controller::respond_to_request($uri[2]);
    }else{
      Pho::not_found();
    }
  }

  public static function not_found(){
      header("Status: 404 Not Found");
      echo "<h1>404</h1><p>Not found</p>";
  }

}
?>
