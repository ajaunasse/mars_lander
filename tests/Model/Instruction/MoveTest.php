<?php
declare(strict_types=1);

namespace App\Test\Model\Instruction;

use App\Factory\Instruction\InstructionFactory;
use App\Factory\Plateau\CoordinateFactory;
use App\Factory\Plateau\DirectionFactory;
use App\Factory\Plateau\PlateauFactory;
use App\Factory\Rover\RoverFactory;
use App\Model\Instruction\Move;
use App\Model\Plateau\Direction;
use App\Model\Rover\Rover;
use PHPUnit\Framework\TestCase;

class MoveTest extends TestCase
{
    protected Rover $rover;
    public function setUp()
    {
        $plateau = PlateauFactory::createPlateauFromCoordinate(
            CoordinateFactory::createFromString('5 5')
        );

        $this->rover = RoverFactory::createRoverFromCoordinate('1 2 N');

        $this->rover ->setPlateau($plateau);
    }

    public function test_move_to_north() {
        RoverFactory::addInstructionsToRover($this->rover , 'M');

        $this->rover->setCurrentDirection(
            DirectionFactory::createFromString(Direction::NORTH)
        );

        $move = $this->rover->getInstructions()->offsetGet(0);


        $this->assertInstanceOf(Move::class, $move);

        $this->assertEquals(2, $this->rover->getCurrentCoordinate()->getY());

        $move->executeInstruction($this->rover);

        $this->assertEquals(3, $this->rover->getCurrentCoordinate()->getY());
    }

    public function test_move_to_south() {
        RoverFactory::addInstructionsToRover($this->rover , 'M');

        $this->rover->setCurrentDirection(
            DirectionFactory::createFromString(Direction::SOUTH)
        );

        $move = $this->rover->getInstructions()->offsetGet(0);


        $this->assertInstanceOf(Move::class, $move);

        $this->assertEquals(2, $this->rover->getCurrentCoordinate()->getY());

        $move->executeInstruction($this->rover);

        $this->assertEquals(1, $this->rover->getCurrentCoordinate()->getY());
    }

    public function test_move_to_east() {
        RoverFactory::addInstructionsToRover($this->rover , 'M');

        $this->rover->setCurrentDirection(
            DirectionFactory::createFromString(Direction::EAST)
        );

        $move = $this->rover->getInstructions()->offsetGet(0);


        $this->assertInstanceOf(Move::class, $move);

        $this->assertEquals(1, $this->rover->getCurrentCoordinate()->getX());

        $move->executeInstruction($this->rover);

        $this->assertEquals(2, $this->rover->getCurrentCoordinate()->getX());
    }

    public function test_move_to_west() {
        RoverFactory::addInstructionsToRover($this->rover , 'M');

        $this->rover->setCurrentDirection(
            DirectionFactory::createFromString(Direction::WEST)
        );

        $move = $this->rover->getInstructions()->offsetGet(0);


        $this->assertInstanceOf(Move::class, $move);

        $this->assertEquals(1, $this->rover->getCurrentCoordinate()->getX());

        $move->executeInstruction($this->rover);

        $this->assertEquals(0, $this->rover->getCurrentCoordinate()->getX());
    }
}