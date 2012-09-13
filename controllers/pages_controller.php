<?
  class pages_controller extends Controller{

    //pages
    public function index(){
      echo "index";
    }

    // /pages/new
    public function new_(){
      pages::new_();
    }
  }
?>
