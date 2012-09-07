<?
  include "base.php";

  class PhoTest extends PHPUnit_Framework_TestCase{
    protected $pho;

    public function test_uri_is_a_resource(){
      $pho = new Pho;
      $pho->define_resources(array("pages","users"));
      $this->assertTrue($pho->uri_is_a_resource($pho->split_uri("/pages")));
    }

    public function test_send_request_to_controller(){
      $pho = new Pho;
      $pho->define_resources(array("pages","users"));
      $uri = $pho->split_uri("/pages");
    }
  }
?>
