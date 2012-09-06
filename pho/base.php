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
      $controller::index();
    }else{
      header("Status: 404 Not Found");
    }
  }
}
?>
