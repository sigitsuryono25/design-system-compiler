<?php
include("compiler.php");
//platform specific
$url = "https://jsonblob.com/api/jsonBlob/1085130273817116672";
$data = file_get_contents($url);
$arrayPlatform = json_decode($data, true);

//global design token
$urlGlobal = "https://jsonblob.com/api/jsonBlob/1081097594830340096";
$dataGlobal = file_get_contents($urlGlobal);
$arrayGlobal = json_decode($dataGlobal, true);

//you still need global design array as reference
$compiler = new Compiler($arrayGlobal);

//set 3rd parameter to FALSE it you're working at global design
$compiler->loopingArray($arrayGlobal, "", FALSE);

/**
 * set 3rd parameter true if you're working at platform spesific
 * comment the function loopingArray above and uncomment this below to work
 * at platform spesific
 **/
// $compiler->loopingArray($arrayPlatform, "", true);
