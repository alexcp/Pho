<?
  require "pho.php";

  $pho = new Pho;
  $pho->route_for("/test","test","test");
  $pho->run();
?>
