<?
require "pho/base.php";

$pho = new Pho;
$pho->route_for("/test",array("template"=>"test"));
$pho->run();
?>
