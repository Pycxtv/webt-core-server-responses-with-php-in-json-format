<?php

namespace OnPHPoint\JsonResponses;

use OnPHPoint\JsonResponses\Ost;
use OnPHPoint\JsonResponses\Song;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Ost::class)]
class OstTest extends TestCase
{
    private ?Ost $ost;

    protected function setUp(): void
    {
        $songs = [
            new Song(1, 'Song #1', 'Max Mustermann', 1, 168.2),
            new Song(2, 'Song #2', 'Max Mustermann', 2, 178.1)
        ];
        $this->ost = new Ost(1, 'Ost-Name', 'Videogame', 1234, $songs);
    }

    public function testCreation()
    {
        self::assertIsObject($this->ost);
        self::assertEquals(1, $this->ost->id);
        self::assertEquals('Ost-Name', $this->ost->name);
        self::assertEquals('Videogame', $this->ost->videoGameName);
        self::assertEquals(1234, $this->ost->releaseYear);
        self::assertEquals([new Song(1, 'Song #1', 'Max Mustermann', 1, 168.2),
            new Song(2, 'Song #2', 'Max Mustermann', 2, 178.1)], $this->ost->songs);
    }

    protected function tearDown(): void
    {
        $this->ost = null;
    }

    public function testJson()
    {
        self::assertJson(json_encode($this->ost));

        self::assertJsonStringEqualsJsonString('{"id": 1,
    "name": "Ost-Name",
    "releaseYear": 1234,
    "songs": [
        {
            "artist": "Max Mustermann",
            "duration": 168.2,
            "id": 1,
            "name": "Song #1",
            "trackNumber": 1
        },
        {
            "artist": "Max Mustermann",
            "duration": 178.1,
            "id": 2,
            "name": "Song #2",
            "trackNumber": 2
        }
    ],
    "videoGameName": "Videogame"}', json_encode($this->ost));
    }
}
