<?php

namespace OnPHPoint\JsonResponses\test;

use Faker\Factory;
use OnPHPoint\JsonResponses\Ost;
use OnPHPoint\JsonResponses\Seeder;
use PHPUnit\Framework\TestCase;
use ReflectionClass;


class SeederTest extends TestCase {
	private Ost $ost;
	private \Faker\Generator $faker;

	protected function setUp(): void {
		$this->faker = Factory::create();
		$this->faker->seed(1234);
	}

	protected static function getOSTMethod($name): \ReflectionMethod {
		$class = new ReflectionClass('Seeder');
		return $class->getMethod($name);
	}


	/**
	 * @throws \ReflectionException
	 */
	public function testOSTGeneration() {
		$generateOST = self::getOSTMethod("generateOST");
		$ost = $generateOST->invoke($this->faker);

		$this->assertObjectHasProperty("id", $ost);
		$this->assertInstanceOf(Ost::class, $ost);
		$this->assertGreaterThan(count($ost->songs), 0);
		$this->assertGreaterThanOrEqual($ost->releaseYear, 1950);
		$this->assertIsString($ost->videoGameName, $ost);
		$this->assertIsString($ost->name, $ost);
	}

}
