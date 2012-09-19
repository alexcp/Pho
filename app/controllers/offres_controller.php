<?
  class offres_controller extends Controller{

    // offres
    public function index(){
      echo json_encode(offres::all());
    }

    // offres/show/id
    public function show($id){
      echo json_encode(offres::find($id));
    }
  }
?>
