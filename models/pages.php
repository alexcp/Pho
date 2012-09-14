<?
  class pages extends Model{

    public function new_(){
      echo get_class($this);
    }

    public function show(){
      echo "show";
    }

    public function all(){
      //marche pas
      //
      var_dump(pages::xml());
    }

    public static function xml(){
      $xml = new xml_adapter("pages");
      return $xml->get_all()->item(1)->getAttribute("id");
    }
  }
?>
