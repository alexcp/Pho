<?
require "pho/base.php";

$pho = new Pho;
$pho->define_resources(array("offres","transactions"));
$pho->run();
?>
