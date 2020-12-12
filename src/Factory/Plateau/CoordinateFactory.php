<?php
declare(strict_types=1);

namespace App\Factory\Plateau;

use App\Exception\BadFormatedCoordinateException;
use App\Model\Plateau\Coordinate;

class CoordinateFactory
{
    public static function createFromString(string $data): Coordinate
    {
        $coordinateAsArray = explode(' ', \trim($data));

        if (sizeof($coordinateAsArray) < 2) {
            throw new BadFormatedCoordinateException(
                sprintf('Coordinate (%s) is mal formated, should be like "x y"', $data)
            );
        }
        return self::createFromArray($coordinateAsArray);
    }

    public static function createFromArray(array $array)
    {
        $coordinate = new Coordinate();

        $coordinate
            ->setX((int) $array[0])
            ->setY((int) $array[1])
        ;

        return $coordinate;
    }
}
