<?php
include("compiler.php");
$url = "your_url_design_here";
$data = file_get_contents($url);
$array = json_decode($data, true);
$compiler = new Compiler($array);

$compiler->loopingArray($array, "");
