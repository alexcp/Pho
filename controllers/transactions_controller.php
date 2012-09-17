<?
  class transactions_controller extends Controller{

    // transactions
    public function index(){
      echo json_encode(transactions::all());
    }

    // transactions/new
    public function new_(){
      transactions::new_();
    }

    // transactions/show/id
    public function show($id){
      echo json_encode(transactions::find($id));
    }
  }
?>
