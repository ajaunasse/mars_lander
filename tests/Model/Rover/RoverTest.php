<?php
declare(strict_types=1);

namespace App\Test\Model\Rover;

use App\Factory\Instruction\InstructionFactory;
use App\Factory\Rover\RoverFactory;
use App\Model\Instruction\RotateLeft;
use App\Model\Instruction\RotateRight;
use App\Model\Plateau\Direction;
use App\Model\Rover\Rover;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    private Rover $rover;

    public function setUp()
    {
        $this->rover = RoverFactory::createRoverFromCoordinate('1 3 N');
    }

    public function test_start_coordinate() {
        $this->assertEquals(1, $this->rover->getStartCoordinate()->getX());
        $this->assertEquals(3, $this->rover->getStartCoordinate()->getY());
    }

    public function test_start_orientation() {
        $this->assertEquals(Direction::NORTH, $this->rover->getCurrentDirection()->getOrientation());
    }

    public function test_up() {
        $this->rover->up();
        $this->assertEquals(4, $this->rover->getCurrentCoordinate()->getY());
    }

    public function test_down() {
        $this->rover->down();
        $this->assertEquals(2, $this->rover->getCurrentCoordinate()->getY());
    }

    public function test_left() {
        $this->rover->left();
        $this->assertEquals(0, $this->rover->getCurrentCoordinate()->getX());
    }

    public function test_right() {
        $this->rover->right();
        $this->assertEquals(2, $this->rover->getCurrentCoordinate()->getX());
    }

    public function test_rotate_right() {
        $rotateRight = InstructionFactory::createInstruction('R');
        $this->assertInstanceOf(RotateRight::class, $rotateRight);

        $rotateRight->executeInstruction($this->rover);

        $this->assertEquals(Direction::EAST, $this->rover->getCurrentDirection()->getOrientation());

    }

    public function test_rotate_left() {
        $rotateLeft = InstructionFactory::createInstruction('L');
        $this->assertInstanceOf(RotateLeft::class, $rotateLeft);

        $rotateLeft->executeInstruction($this->rover);

        $this->assertEquals(Direction::WEST, $this->rover->getCurrentDirection()->getOrientation());
    }


}