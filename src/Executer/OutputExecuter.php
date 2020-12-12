<?php
declare(strict_types=1);

namespace App\Executer;

use App\Model\Rover\Rover;
use App\Model\Rover\RoverCollection;

class OutputExecuter
{
    public static function handle(RoverCollection $rovers): string
    {
        //Output the final coordinate of each rover
        foreach ($rovers->getRovers() as $key => $rover) {
            /** @var Rover $rover */

            $message .= '<b>Rover N.'.($key + 1) .' :</b> ';
            $message .= $rover->displayFullCoordinate() . ' <br>';
        }

        return $message;
    }
}
