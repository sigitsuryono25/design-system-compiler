<?php
include("compiler.php");
//platform specific
$url = "PLATFORM_DESIGN_TOKEN_URL_HERE";
$data = file_get_contents($url);
$array = json_decode($data, true);

//global design token
$urlGlobal = "GLOBAL_DESIGN_TOKEN_URL_HERE";
$dataGlobal = file_get_contents($urlGlobal);
$arrayGlobal = json_decode($dataGlobal, true);

$compiler = new Compiler($arrayGlobal);

//set 3rd parameter true if you're working at platform spesific
$compiler->loopingArray($array, "", true);
