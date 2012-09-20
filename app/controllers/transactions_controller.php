<?
  class transactions_controller extends Controller{

    // transactions
    public static function index(){
      Controller::render_json(transactions::all());
    }

    public static function create(){
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
    public static function show($id){
      Controller::render_json(transactions::find($id));
    }
  }
?>
