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

  }
?>
