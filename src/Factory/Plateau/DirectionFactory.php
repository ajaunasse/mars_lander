<?php

declare(strict_types=1);

namespace App\Factory\Plateau;

use App\Exception\NotValidDirectionException;
use App\Model\Plateau\Direction;

class DirectionFactory
{
    public static function createFromString(string $orientation): Direction
    {
        $direction = new Direction();

        if (!$direction->isValid($orientation)) {
            throw new NotValidDirectionException(
                sprintf(
                    '%s doesn\'t exist, valid direction are %s, %s, %s and %s',
                    $orientation,
                    Direction::WEST,
                    Direction::EAST,
                    Direction::NORTH,
                    Direction::SOUTH
                )
            );
        }

        $direction->setOrientation(trim($orientation));

        return $direction;
    }
}
