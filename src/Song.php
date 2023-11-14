<?php

namespace OnPHPoint\JsonResponses;

class Song {
	public function __construct(
		public int $id,
		public string $name,
		public string $artist,
		public int $trackNumber,
		public float $duration
	) {
	}
}