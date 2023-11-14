<?php

class Ost {
	public function __construct(
		public int $id,
		public string $name,
		public string $videoGameName,
		public int $releaseYear,
		public array $songs
	) {}
}