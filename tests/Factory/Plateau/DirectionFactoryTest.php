<?php


namespace App\Test\Factory\Plateau;

use App\Exception\NotValidDirectionException;
use App\Factory\Plateau\DirectionFactory;
use App\Model\Plateau\Direction;
use PHPUnit\Framework\TestCase;

class DirectionFactoryTest extends TestCase
{

    public function test_create_south_direction_from_string() {
        $direction = 'S';
        $direction = DirectionFactory::createFromString($direction);

        $this->assertSame(Direction::SOUTH, $direction->getOrientation());
    }

    public function test_create_north_direction_from_string() {
        $direction = 'N';
        $direction = DirectionFactory::createFromString($direction);

        $this->assertSame(Direction::NORTH, $direction->getOrientation());
    }

    public function test_create_east_direction_from_string() {
        $direction = 'E';
        $direction = DirectionFactory::createFromString($direction);

        $this->assertSame(Direction::EAST, $direction->getOrientation());
    }

    public function test_create_west_direction_from_string() {
        $direction = 'W';
        $direction = DirectionFactory::createFromString($direction);

        $this->assertSame(Direction::WEST, $direction->getOrientation());
    }

    public function test_create_not_valid_direction_from_string() {
        $direction = 'A';
        $this->expectException(NotValidDirectionException::class);
        DirectionFactory::createFromString($direction);
    }
}