<?
  class pages_controller extends Controller{

    // pages
    public function index(){
      pages::all();
    }

    // pages/new
    public function new_(){
      pages::new_();
    }

    // pages/show/id
    public function show($id){
      pages::show();
    }
  }
?>
