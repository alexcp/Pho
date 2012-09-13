<?
  class pages_controller extends Controller{

    // pages
    public function index(){
      echo "index";
    }

    // pages/new
    public function new_(){
      pages::new_();
    }

    // pages/show/id
    public function show($id){
      echo $id;
    }
  }
?>
