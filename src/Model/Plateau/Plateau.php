<?php
declare(strict_types=1);

namespace App\Model\Plateau;

class Plateau
{
    protected Coordinate $minCoordinate;
    protected Coordinate $maxCoordinate;

    public function getMinCoordinate(): Coordinate
    {
        return $this->minCoordinate;
    }

    public function setMinCoordinate(Coordinate $minCoordinate): Plateau
    {
        $this->minCoordinate = $minCoordinate;
        return $this;
    }

    public function getMaxCoordinate(): Coordinate
    {
        return $this->maxCoordinate;
    }

    public function setMaxCoordinate(Coordinate $maxCoordinate): Plateau
    {
        $this->maxCoordinate = $maxCoordinate;
        return $this;
    }
}
