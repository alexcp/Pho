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

    public function update_attribute($nom,$valeur){
      $this->$nom = $valeur;
      offres::xml()->edit_attribute($this->id,$nom,$valeur);
    }

    public static function xml(){
      return new xml_adapter("offres");
    }

  }
?>
