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
        if($offre->valide_la_transaction($transaction->date)){
          $offre->nouvelle_transaction();
          $transaction->save();
        }else{
          header("Status: 406 Not Acceptable");
        }
      }else{
        Pho::not_found();
      }
    }

    // transactions/id
    public function show($id){
      echo json_encode(transactions::find($id));
    }
  }
?>
