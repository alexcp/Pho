<?
  class offres_controller extends Controller{

    // offres
    public function index(){
      //echo json_encode(offres::all());
      var_dump(offres::all());
    }

    // offres/new
    public function new_(){
      offres::new_();
    }

    // offres/show/id
    public function show($id){
      echo json_encode(offres::find($id));
    }
  }
?>
