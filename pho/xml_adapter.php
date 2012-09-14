<?
  class xml_adapter{
    public $xml;
    public $plural_name;
    public $single_name;

    public function __construct($name){
      $this->xml = new DOMDocument();
      $this->plural_name = $name;
      $this->single_name = preg_replace('/s$/','',$name);
      $this->xml->Load("data/data.xml");
    }

    public function get_all(){
      return $this->xml->getElementsByTagName($this->plural_name)->item(0)->getElementsByTagName($this->single_name);
    }

    public function find($id){
      $object = $xml->getElementsById($id);
      return unserialize($object);
    }

    public function save($filename){
      $xml->Save($filename);
    }

    public function create($type,$object){
      $new = $xml->createElement($type,$serialize($object));
      $new->setAttribute("id",$object->id());
    }

    public function remove($id){
      $element = $xml->getElementsById($id); 
      $xml->removeChild($element);
    }

  }
?>
