<?php
require_once '../vendor/autoload.php';
use OnPHPoint\JsonResponses\Seeder;
header("Content-type: application/json");

$osts = Seeder::generateOSTs(10);
$secretOst = $osts[count($osts) - 1];
$osts = array_slice($osts, 0, count($osts) - 1);

$ost_num = $_GET['ost'] ?? null;

if (isset($ost_num)) {
	if ($ost_num == 666) {
		echo json_encode($secretOst);
		return;
	}

    $filtered = array_values(array_filter($osts, function($ost) use ($ost_num) {
        return $ost->id == $ost_num;
    }));
    if (!isset($filtered[0])) {
        http_response_code(404);
    } else {
	    echo json_encode($filtered[0]);
    }
} else {
    echo json_encode($osts);
}