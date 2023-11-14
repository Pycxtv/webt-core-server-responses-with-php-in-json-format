<?php

namespace OnPHPoint\JsonResponses;

require_once '../vendor/autoload.php';

$osts = Seeder::generateOSTs();

foreach ($osts as $ost) {
    var_dump($ost);
}
