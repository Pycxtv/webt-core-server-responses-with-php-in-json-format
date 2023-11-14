<?php
require_once '../vendor/autoload.php';
header("Content-type: application/json");

$ost_num = $_GET['ost'] ?? 'none';

$seeder = new Seeder();
$ost_arr = $seeder->generateOSTs();

if ($ost_arr == 'none') {
	echo json_encode($ost_arr);
}

//echo <<<OUTPUT
//{"track_number":$track_number}
//OUTPUT;
