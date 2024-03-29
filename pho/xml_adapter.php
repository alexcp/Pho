<?
  class xml_adapter{
    public $xml;
    public $plural_name;
    public $single_name;

    public function __construct($name){
      $this->xml = new DOMDocument();
      $this->plural_name = $name;
      $this->single_name = preg_replace('/s$/','',$name);
      $this->xml->Load("data/$name.xml");
    }

    public function get_all(){
      return $this->xml->getElementsByTagName($this->plural_name)->item(0)->getElementsByTagName($this->single_name);
    }

    public function save(){
      $this->xml->Save("data/$this->plural_name.xml");
    }

    public function edit_attribute($id,$attribute,$value){
      $element = $this->find($id);
      $element->getElementsByTagName($attribute)->item(0)->nodeValue = $value;
      $this->save();
    }

    public function find($id){
      $element = null;
      foreach($this->get_all() as $obj){
        if($obj->getAttribute("id") == $id){
          $element = $obj;
        }
      }
      return $element;
    }

    public function create($obj_values){
      $this->xml->formatOutput = true;
      $new = $this->xml->createElement($this->single_name);
      $new->appendChild($this->xml->createAttribute("id"));
      $new->setAttribute('id',$obj_values["id"]);
      foreach($obj_values as $key => $value){
        if($key != "id"){
          $new->appendChild($this->xml->createElement($key,$value));
        }
      }
      $root_element = $this->xml->getElementsByTagName($this->plural_name)->item(0);
      $root_element->appendChild($new);
      $this->save();
    }

    public function remove($id){
      $element = $this->xml->getElementById($id); 
      $this->xml->removeChild($element);
    }

  }
?>
