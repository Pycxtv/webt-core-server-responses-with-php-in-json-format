<?php

namespace OnPHPoint\JsonResponses;

use Faker\Factory;
use OnPHPoint\JsonResponses\Ost;
use PHPUnit\Framework\TestCase;
use ReflectionClass;


class SeederTest extends TestCase {
	private Ost $ost;
	private \Faker\Generator $faker;

	protected function setUp(): void {
		$this->faker = Factory::create();
		$this->faker->seed(1234);
	}

	/**
	 * @throws \ReflectionException
	 */
	protected static function getSeederMethod($name): \ReflectionMethod {
		$class = new ReflectionClass(Seeder::class);
		return $class->getMethod($name);
	}


	/**
	 * @throws \ReflectionException
	 */
	public function testOSTGeneration() {
		$generateOST = self::getSeederMethod("generateOST");
		$ost = $generateOST->invoke($generateOST, $this->faker);

		$this->assertObjectHasProperty("id", $ost);
		$this->assertInstanceOf(Ost::class, $ost);
		$this->assertGreaterThan(0, sizeOf($ost->songs));
		$this->assertGreaterThanOrEqual(1950, $ost->releaseYear);
		$this->assertIsString($ost->videoGameName);
		$this->assertIsString($ost->name);
	}


	public function testOSTArrayGeneration() {
		$numOSTs = 7;
		$osts = Seeder::generateOSTs($numOSTs);
		$this->assertCount($numOSTs, $osts);
	}

}
