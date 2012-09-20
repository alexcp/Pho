<?
  class offres_controller extends Controller{

    // offres
    public static function index(){
      Controller::render_json(offres::all());
    }

    // offres/show/id
    public static function show($id){
      Controller::render_json(offres::find($id));
    }

    // offres/meilleurs_vendeurs
    public static function meilleurs_vendeurs(){
      function sort_vendu($a,$b){
        return $a->vendu < $b->vendu;
      }

      $all = offres::all();
      usort($all,"sort_vendu");
      Controller::render_json(array_slice($all,0,3));
    }

  }
?>
