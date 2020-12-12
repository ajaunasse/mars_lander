<?php
declare(strict_types=1);

namespace App\Model\Instruction;

use App\Model\Plateau\Direction;
use App\Model\Rover\Rover;

class Move implements Instruction
{
    public function executeInstruction(Rover $rover)
    {
        switch ($rover->getCurrentDirection()->getOrientation()) {
            case Direction::SOUTH:
                $this->moveToSouth($rover);
                break;
            case Direction::WEST:
                $this->moveToWest($rover);
                break;
            case Direction::EAST:
                $this->moveToEast($rover);
                break;
            case Direction::NORTH:
                $this->moveToNorth($rover);
                break;
        }
    }

    public function moveToSouth(Rover $rover)
    {
        $currentCoordinate = $rover->getCurrentCoordinate();

        if (0 == $currentCoordinate->getY()) {
            //TODO: Throw exception when the rover can't move
        }

        $rover->down();
    }

    public function moveToNorth(Rover $rover)
    {
        $currentCoordinate = $rover->getCurrentCoordinate();

        if ($currentCoordinate->getY() == $rover->getPlateau()->getMaxCoordinate()->getY()) {
            //TODO: Throw exception when the rover can't move
        }

        $rover->up();
    }

    public function moveToWest(Rover $rover)
    {
        $currentCoordinate = $rover->getCurrentCoordinate();

        if (0 == $currentCoordinate->getX()) {
            //TODO: Throw exception when the rover can't move
        }

        $rover->left();
    }

    public function moveToEast(Rover $rover)
    {
        $currentCoordinate = $rover->getCurrentCoordinate();

        if ($rover->getPlateau()->getMaxCoordinate()->getX() == $currentCoordinate->getX()) {
            //TODO: Throw exception when the rover can't move
        }

        $rover->right();
    }
}
