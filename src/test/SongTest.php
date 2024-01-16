<?php

namespace OnPHPoint\JsonResponses\test;

use OnPHPoint\JsonResponses\Song;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Song::class)]
class SongTest extends TestCase
{

    public function testJsonSerialization()
    {
        $song = new Song(1, 'Name', 'Künstler', 1, 123.456);
        self::assertJsonStringEqualsJsonString('{"id": 1, "name":"Name", "artist":"Künstler", "trackNumber":1, "duration":123.456}', json_encode($song));
    }
}
