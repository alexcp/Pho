<?
  class Model{
    function new_(){}
    function save(){}

    public static function all(){
      $all = array();
      $data = array();
      $object_variables = get_class_vars(get_called_class());
      foreach(static::xml()->get_all() as $obj){
          foreach($object_variables as $var_name => $useless_default_var_value){
            if($var_name == "id"){
              $data["id"] = $obj->getAttribute("id");
            }else{
              $data[$var_name] = $obj->getElementsByTagName($var_name)->item(0)->nodeValue;
            }
          }
        $all[$obj->getAttribute("id")] = new static($data);
      }
      return $all;
    }

    public function __construct($data){
      foreach($data as $key => $value){
        $this->$key = $value;
      }
    }

    public static function xml(){
      return new xml_adapter(get_called_class());
    }

    public static function find($id){
      $result = static::all();
      return $result[$id];
    }

    public function update_attribute($nom,$valeur){
      $this->$nom = $valeur;
      static::xml()->edit_attribute($this->id,$nom,$valeur);
    }

  }
?>
