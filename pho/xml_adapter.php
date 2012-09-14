<?
  class xml_adapter{
    public $xml;

    public function __construct($filename){
      $xml = new DOMDocument();
      $xml->Load($filename);
    }

    public function get_all($element_name){
      return $xml->getElementsByTagName($element_name);
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
