<?
  require "base.php";

  class PhoTest extends PHPUnit_Framework_TestCase{
    protected $pho;

    public function test_route_for(){
      $pho = new Pho;
      $pho->route_for("/test",array("template"=>"test"));
      $this->assertEquals(array("/test"=>array('template'=>'views/test.php')),$pho->routes);
    }

    public function test_route_for_throw_exception_if_wrong_argument(){
      $pho = new Pho;
      try{
        $pho->route_for("/test",array("template_error"=>"test"));
      }catch(InvalidArgumentException $expected){
        return;
      }
      $this->fail("no exception raised");
    }

  }
?>
