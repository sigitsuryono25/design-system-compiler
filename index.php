<?php
include("compiler.php");
//platform specific
$url = "https://jsonblob.com/api/jsonBlob/1085130273817116672";
$data = file_get_contents($url);
$array = json_decode($data, true);

//global design token
$urlGlobal = "https://jsonblob.com/api/jsonBlob/1081097594830340096";
$dataGlobal = file_get_contents($urlGlobal);
$arrayGlobal = json_decode($dataGlobal, true);

$compiler = new Compiler($arrayGlobal);

$compiler->loopingArray($arrayGlobal, "", false);
