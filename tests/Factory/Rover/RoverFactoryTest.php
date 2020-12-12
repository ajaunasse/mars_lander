<?php
declare(strict_types=1);

namespace App\Test\Factory\Rover;

use App\Factory\Rover\RoverFactory;
use App\Model\Instruction\Move;
use App\Model\Plateau\Direction;
use PHPUnit\Framework\TestCase;

class RoverFactoryTest extends TestCase
{
    public function test_create_rover_from_string() {
        $coordinateAsString = '1 2 N';

        $rover = RoverFactory::createRoverFromCoordinate($coordinateAsString);

        $this->assertSame(Direction::NORTH, $rover->getCurrentDirection()->getOrientation());

        $this->assertSame(1, $rover->getCurrentCoordinate()->getX());
        $this->assertSame(2, $rover->getCurrentCoordinate()->getY());
        $this->assertSame(2, $rover->getStartCoordinate()->getY());
        $this->assertSame(1, $rover->getStartCoordinate()->getX());
    }

    public function test_create_instruction_to_rover() {
        $coordinateAsString = '1 2 N';

        $rover = RoverFactory::createRoverFromCoordinate($coordinateAsString);

        $instruction = 'M';

        RoverFactory::addInstructionsToRover($rover, $instruction);

        $instructions = $rover->getInstructions();

        $instruction = $instructions->offsetGet(0);

        $this->assertInstanceOf(Move::class, $instruction);
        $this->assertCount(1, $instructions);
    }
}