<?
  class ControllerTest extends PHPUnit_Framework_TestCase{

    public function test_request_is_a_default_function(){
      $this->assertTrue(Controller::request_is_an_availaible_function("index"));
    }
  }
?>
