<?php

namespace OnPHPoint\JsonResponses;

require_once '../vendor/autoload.php';

$osts = Seeder::generateOSTs();

//foreach ($osts as $ost) {
//    var_dump($ost);
//}



echo json_encode($osts[0]->songs[0]);