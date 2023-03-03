<?php
include("compiler.php");
$compiler = new Compiler();

$url = "your_url_design_here";
$data = file_get_contents($url);
$array = json_decode($data, true);

$compiler->loopingArray($array, "");
