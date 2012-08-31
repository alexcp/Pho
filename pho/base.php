<?
class Pho{
  public $routes;

  public function request(){
    return $_SERVER["REQUEST_URI"];
  }

  public function route_for($uri,$http_header,$template){
    $response['http_header'] = $http_header;
    $response['template'] = "views/";
    $response['template'] .= $template . ".php";
    $this->add_route($uri,$response);
  }

  protected function add_route($uri,$response){
    $this->routes[$uri] = $response; 
  }

  public function ressource($name){
    $this->add_routes($name);
  }

  public function run(){
    $this->respond_to($this->request());
  }

  public function respond_to($request_uri){
    if(!@include($this->routes[$request_uri]["template"])){
      header("Status: 404 Not Found");
    }
  }
}
?>
