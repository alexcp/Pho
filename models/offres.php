<?
  class offres extends Model{
    public $id;
    public $nom;
    public $prix;
    public $description;
    public $date_expiration;
    public $fournisseur;
    public $quantite;

    public function new_(){
      echo get_class($this);
    }

    public static function find($id){
      $result = offres::all();
      return $result[$id];
    }

    public static function all(){
      $all = array();
      foreach(offres::xml()->get_all() as $obj){
        $data = array(
          $obj->getAttribute("id"),
            $obj->getElementsByTagName("nom")->item(0)->nodeValue,
            $obj->getElementsByTagName("prix")->item(0)->nodeValue,
            $obj->getElementsByTagName("description")->item(0)->nodeValue,
            $obj->getElementsByTagName("date_expiration")->item(0)->nodeValue,
            $obj->getElementsByTagName("fournisseur")->item(0)->nodeValue,
            $obj->getElementsByTagName("quantite")->item(0)->nodeValue,
            );
        $all[$obj->getAttribute("id")] = new offres($data);
      }
      return $all;
    }

    public static function xml(){
      return new xml_adapter("offres");
    }

    public function __construct($data){
      $this->id = $data[0];
      $this->nom = $data[1];
      $this->prix = $data[2];
      $this->description = $data[3];
      $this->date_expiration = $data[4];
      $this->fournisseur = $data[5];
      $this->quantite = $data[6];
    }

  }
?>
