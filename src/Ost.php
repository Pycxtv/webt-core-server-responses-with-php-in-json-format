<?php

class Ost {
//  unique ID, name, video game name (the one to which it is related to), a release year, and track list consisting of songs
	public function __construct(
		public int $id,
		public string $name,
		public string $videoGameName,
		public int $releaseYear,
		public array $songs
	) {}
}