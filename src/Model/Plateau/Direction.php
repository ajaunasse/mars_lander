<?php
declare(strict_types=1);

namespace App\Model\Plateau;

class Direction
{
    const NORTH = 'N';
    const SOUTH = 'S';
    const WEST = 'W';
    const EAST = 'E';

    public string $orientation;

    public function getOrientation(): string
    {
        return $this->orientation;
    }

    public function setOrientation(string $orientation): Direction
    {
        $this->orientation = $orientation;
        return $this;
    }

    /**
     * Check if the direction is a valid orientation
     */
    public function isValid(string $direction): bool
    {
        return in_array(
            $direction,
            [
                self::NORTH,
                self::SOUTH,
                self::WEST,
                self::EAST
            ]
        )
        ;
    }
}
