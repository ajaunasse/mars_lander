<?php
declare(strict_types=1);

namespace App\Test\Factory\Plateau;

use App\Exception\BadFormatedCoordinateException;
use App\Factory\Plateau\CoordinateFactory;
use PHPUnit\Framework\TestCase;

class CoordinateFactoryTest extends TestCase
{

    public function test_create_coordinate_from_string_with_x_y_coordinate() {
        $coordinateAsString = '1 2';

        $coordinate = CoordinateFactory::createFromString($coordinateAsString);

        $this->assertEquals(1, $coordinate->getX());
        $this->assertEquals(2, $coordinate->getY());
    }

    public function test_create_coordinate_from_mal_formatted_string() {
        $coordinateAsString = '12';
        $this->expectException(BadFormatedCoordinateException::class);
        CoordinateFactory::createFromString($coordinateAsString);
    }

    public function test_create_coordinate_from_full_coordinate() {
        $coordinateAsString = '1 2 N';

        $coordinate = CoordinateFactory::createFromString($coordinateAsString);

        $this->assertEquals(1, $coordinate->getX());
        $this->assertEquals(2, $coordinate->getY());
    }

    public function test_create_coordinate_from_array() {
        $coordinateAsArray = [1, 2, 'N'];

        $coordinate = CoordinateFactory::createFromArray($coordinateAsArray);

        $this->assertEquals(1, $coordinate->getX());
        $this->assertEquals(2, $coordinate->getY());
    }
}