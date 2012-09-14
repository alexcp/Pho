<?
  class offres_controller extends Controller{

    // offres
    public function index(){
      offres::all();
    }

    // offres/new
    public function new_(){
      offres::new_();
    }

    // offres/show/id
    public function show($id){
      offres::show();
    }
  }
?>
