<?php
require_once '../vendor/autoload.php';
use OnPHPoint\JsonResponses\Seeder;
header("Content-type: application/json");

$osts = Seeder::generateOSTs(10);

$ost_num = $_GET['ost'] ?? null;

if (isset($ost_num)) {
    $filtered = array_values(array_filter($osts, function($val) {
        global $ost_num;
        return $val->id == $ost_num;
    }));
    if (!isset($filtered[0])) {
        http_response_code(404);
    } else {
	    echo json_encode($filtered[0]);

    }
} else {
    echo json_encode($osts);
}