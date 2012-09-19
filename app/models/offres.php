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
  }
?>
