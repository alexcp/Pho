<?
  class transactions_controller extends Controller{

    // transactions
    public function index(){
      echo json_encode(transactions::all());
    }

    public function create(){
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        $transaction = new transactions($_REQUEST);
        $offre = offres::find($transaction->offre_id);
        $offre->nouvelle_transaction();
        $transaction->save();
      }
    }

    // transactions/show/id
    public function show($id){
      echo json_encode(transactions::find($id));
    }
  }
?>
