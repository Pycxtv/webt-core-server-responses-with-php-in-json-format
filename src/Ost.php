<?php
namespace OnPHPoint\JsonResponses;

class Ost implements \JsonSerializable {
	public function __construct(
		public int $id,
		public string $name,
		public string $videoGameName,
		public int $releaseYear,
		public array $songs
	) {}

	public function jsonSerialize(): mixed {
		return array(
			'id' => $this->id,
			'name' => $this->name,
			'videoGameName' => $this->videoGameName,
			'releaseYear' => $this->releaseYear,
			'songs' => $this->songs
		);
	}
}