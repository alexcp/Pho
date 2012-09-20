<?
  class offres extends Model{
    public $id;
    public $nom;
    public $prix;
    public $description;
    public $date_expiration;
    public $fournisseur;
    public $quantite;
    public $image;
    public $vendu;

    public function nouvelle_transaction(){
      $this->quantite--;
      $this->vendu++;
      $this->update_attribute("quantite",$this->quantite);
      $this->update_attribute("vendu",$this->vendu);
    }

    public function valide_la_transaction($date_de_la_transaction){
      $valide = false;
      if($this->quantite != 0){
        $valide = strtotime($this->date_expiration) > strtotime($date_de_la_transaction);
      }
      return $valide;
    }
  }
?>
