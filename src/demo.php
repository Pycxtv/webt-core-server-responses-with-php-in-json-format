<?php

namespace OnPHPoint\JsonResponses;

$osts = Seeder::generateOSTs();

foreach ($osts as $ost) {
    var_dump($ost);
}
