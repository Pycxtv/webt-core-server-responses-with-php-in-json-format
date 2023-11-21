<?php

namespace OnPHPoint\JsonResponses;

use Faker\Factory;

class Seeder
{
    private static int $songIdCounter = 1;
    private static int $ostIdCounter = 1;

    private static function generateOST($faker): Ost
    {
        $songList = [];
        for ($i = 0; $i < 4; $i++) {
            $name = $faker->colorName() . $faker->word();
            $artist = $faker->name;
            $trackNumber = $i + 1;
            $duration = $faker->randomFloat(1, 60, 300);
            $songList[] = new Song(self::$songIdCounter++, $name, $artist, $trackNumber, $duration);
        }

        $videoGameName = $faker->words(2, true) . $faker->colorName();
        $albumName = $faker->colorName() . ' ' .  $faker->companySuffix();
        $releaseYear = $faker->year();
        return new Ost(self::$ostIdCounter++, $albumName, $videoGameName, $releaseYear, $songList);
    }

    /** @return array<Ost> */
    public static function generateOSTs($n = 4): array
    {
        $faker = Factory::create();
        $faker->seed(1234);

        $osts = [];
        for ($i = 0; $i < $n; $i++) {
            $osts[] = self::generateOST($faker);
        }
        return $osts;
    }
}