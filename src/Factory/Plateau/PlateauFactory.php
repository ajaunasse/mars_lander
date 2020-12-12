<?php
declare(strict_types=1);

namespace App\Factory\Plateau;

use App\Model\Plateau\Coordinate;
use App\Model\Plateau\Plateau;

class PlateauFactory
{
    public static function createPlateauFromCoordinate(Coordinate $maxCoordinate)
    {
        $plateau = new Plateau();
        $plateau
           ->setMinCoordinate(CoordinateFactory::createFromString('0 0'))
           ->setMaxCoordinate($maxCoordinate)
       ;

        return $plateau;
    }
}
