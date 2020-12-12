<?php

declare(strict_types=1);

namespace App\Model\Plateau;

class Coordinate
{
    protected int $x;
    protected int $y;

    public function getX(): int
    {
        return $this->x;
    }

    public function setX(int $x): Coordinate
    {
        $this->x = $x;
        return $this;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(int $y): Coordinate
    {
        $this->y = $y;
        return $this;
    }
}
