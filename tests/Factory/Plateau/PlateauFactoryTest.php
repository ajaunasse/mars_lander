<?php


namespace App\Test\Factory\Plateau;

use App\Factory\Plateau\CoordinateFactory;
use App\Factory\Plateau\PlateauFactory;
use PHPUnit\Framework\TestCase;

class PlateauFactoryTest extends TestCase
{
    public function test_plateau_from_string() {
        $coordinateAsString = '5 5';
        $coordinate = CoordinateFactory::createFromString($coordinateAsString);

        $plateau = PlateauFactory::createPlateauFromCoordinate($coordinate);

        $this->assertSame(5, $plateau->getMaxCoordinate()->getY());
        $this->assertSame(5, $plateau->getMaxCoordinate()->getX());
        $this->assertSame(0, $plateau->getMinCoordinate()->getX());
        $this->assertSame(0, $plateau->getMinCoordinate()->getY());

    }
}