<?
  class offres_controller extends Controller{

    // offres
    public function index(){
      echo json_encode(offres::all());
    }

    // offres/new
    public function new_(){
      $test = offres::find("1");
      var_dump($test);
    }

    // offres/show/id
    public function show($id){
      echo json_encode(offres::find($id));
    }
  }
?>
