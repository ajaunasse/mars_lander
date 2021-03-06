<?php
declare(strict_types=1);

namespace App\Model\Instruction;

use App\Model\Plateau\Direction;
use App\Model\Rover\Rover;

class RotateLeft implements Rotatable, Instruction
{
    const MAPPING_ROTATE_FROM = [
        Direction::NORTH => Direction::WEST,
        Direction::WEST => Direction::SOUTH,
        Direction::SOUTH => Direction::EAST,
        Direction::EAST => Direction::NORTH,
    ];

    public function executeInstruction(Rover $rover)
    {
        $rover->spin($this);
    }

    public function rotateFrom(string $currentDirection): string
    {
        if (!isset(self::MAPPING_ROTATE_FROM[$currentDirection])) {
            //TODO: throw exception
        }
        return self::MAPPING_ROTATE_FROM[$currentDirection];
    }
}
