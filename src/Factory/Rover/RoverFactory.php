<?php
declare(strict_types=1);

namespace App\Factory\Rover;

use App\Factory\Instruction\InstructionFactory;
use App\Factory\Plateau\CoordinateFactory;
use App\Factory\Plateau\DirectionFactory;
use App\Model\Rover\Rover;

class RoverFactory
{
    public static function createRoverFromCoordinate(string $coordinate): Rover
    {
        $rover = new Rover();

        $coordinateAsArray = explode(' ', \trim($coordinate));
        $startCoordinate = CoordinateFactory::createFromString($coordinate);
        $currentCoordinate = (clone $startCoordinate);

        if (!isset($coordinateAsArray[2])) {
            //TODO: throw exception;
        }

        $rover
            ->setStartCoordinate($startCoordinate)
            ->setCurrentCoordinate($currentCoordinate)
            ->setCurrentDirection(
                DirectionFactory::createFromString($coordinateAsArray[2])
            )
        ;

        return $rover;
    }

    public static function addInstructionsToRover(Rover $rover, string $instruction)
    {
        $rover->setInstructions(
            InstructionFactory::createInstructions($instruction)
        );
    }
}
