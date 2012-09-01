<?
class Pho{
  public $routes;
  public $template_directory = "views/";

  public function request(){
    return $_SERVER["REQUEST_URI"];
  }

  public function route_for($uri,$response){
    if(isset($response["template"])){
      $response['template'] = $this->template_directory . $response["template"] . ".php";
    }else if(!isset($response["http_header"])){
      throw new InvalidArgumentException('Wrong response type');
    }
    $this->add_route($uri,$response);
  }

  protected function add_route($uri,$response){
    $this->routes[$uri] = $response; 
  }

  public function run(){
    $this->respond_to($this->request());
  }

  public function respond_to($request_uri){
    if(isset($this->routes[$request_uri]["template"])){
      include($this->routes[$request_uri]["template"]);
    }else if(isset($this->routes[$request_uri]["http_header"])){
      header($this->routes[$request_uri]["http_header"]);
    }else{
      header("Status: 404 Not Found");
    }
  }
}
?>
