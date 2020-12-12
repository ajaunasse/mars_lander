<?php
declare(strict_types=1);

namespace App\Executer;

use App\Model\Rover\RoverCollection;
use App\Factory\Plateau\CoordinateFactory;
use App\Factory\Plateau\PlateauFactory;
use App\Factory\Rover\RoverFactory;

class InputExecuter
{
    /**
     * @param resource $resource
     */
    public static function handle($resource): RoverCollection
    {
        $i = 0;

        $currentRover = null;
        $rovers = new RoverCollection();

        //Collect the current set up of the plateau and all the instructions of the rover's crew.
        while (($buffer = fgets($resource, 4096)) !== false) {

            //Delete line break to prevent bug when parsing the string
            $instructionAsString = \str_replace(array("\n", "\r"), '', $buffer);

            //First line is Plateau's Coordinate
            if (0 == $i) {
                $plateau = PlateauFactory::createPlateauFromCoordinate(
                    CoordinateFactory::createFromString($instructionAsString)
                );
                $i++;
                continue;
            }

            if(null == $plateau) {
                //TODO: throw exception
            }

            //If line index is odd, is the current rover coordinate and is a new rover
            //Otherwise is the instruction of the current rover
            if ($i % 2 !== 0) {
                $currentRover = RoverFactory::createRoverFromCoordinate($instructionAsString);
                $currentRover->setPlateau($plateau);
            } else {
                RoverFactory::addInstructionsToRover($currentRover, $instructionAsString);
                $rovers->add($currentRover);
            }

            $i++;
        }

        //Execute instructions of each rover
        $rovers->execute();

        return $rovers;
    }
}
