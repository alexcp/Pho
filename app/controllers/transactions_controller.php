<?
  class transactions_controller extends Controller{

    // transactions
    public function index(){
      echo json_encode(transactions::all());
    }

    public function create(){
      //var_dump($_REQUEST);
      //$test = new transactions($_REQUEST);
      $test = offres::find(1);
      var_dump($test);
      $test->save();
    }

    // transactions/show/id
    public function show($id){
      echo json_encode(transactions::find($id));
    }
  }
?>
