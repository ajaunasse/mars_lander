<?php

declare(strict_types=1);

namespace App\Model\Rover;

use App\Factory\Plateau\DirectionFactory;
use App\Model\Instruction\Instruction;
use App\Model\Instruction\InstructionCollection;
use App\Model\Instruction\Rotatable;
use App\Model\Plateau\Coordinate;
use App\Model\Plateau\Direction;
use App\Model\Plateau\Plateau;

class Rover
{
    protected Plateau $plateau;
    protected Coordinate $startCoordinate;
    protected Coordinate $currentCoordinate;
    protected Direction $currentDirection;
    protected InstructionCollection $instructions;

    public function getStartCoordinate(): Coordinate
    {
        return $this->startCoordinate;
    }

    public function setStartCoordinate(Coordinate $startCoordinate): Rover
    {
        $this->startCoordinate = $startCoordinate;
        return $this;
    }

    public function getCurrentCoordinate(): Coordinate
    {
        return $this->currentCoordinate;
    }

    public function getCurrentDirection(): Direction
    {
        return $this->currentDirection;
    }

    public function setCurrentDirection(Direction $currentDirection): Rover
    {
        $this->currentDirection = $currentDirection;
        return $this;
    }

    public function setCurrentCoordinate(Coordinate $currentCoordinate): Rover
    {
        $this->currentCoordinate = $currentCoordinate;
        return $this;
    }

    public function getInstructions(): InstructionCollection
    {
        return $this->instructions;
    }

    public function setInstructions(InstructionCollection $instructions): Rover
    {
        $this->instructions = $instructions;
        return $this;
    }

    public function getPlateau(): Plateau
    {
        return $this->plateau;
    }

    public function setPlateau(Plateau $plateau): Rover
    {
        $this->plateau = $plateau;
        return $this;
    }

    public function up()
    {
        $this->currentCoordinate->setY($this->currentCoordinate->getY() + 1);
    }

    public function down()
    {
        $this->currentCoordinate->setY($this->currentCoordinate->getY() - 1);
    }

    public function left()
    {
        $this->currentCoordinate->setX($this->currentCoordinate->getX() - 1);
    }

    public function right()
    {
        $this->currentCoordinate->setX($this->currentCoordinate->getX() + 1);
    }

    public function displayFullCoordinate()
    {
        $currentCoordinate = $this->currentCoordinate;
        $currentDirection = $this->currentDirection;

        return sprintf(
            '%d %d %s',
            $currentCoordinate->getX(),
            $currentCoordinate->getY(),
            $currentDirection->getOrientation()
        );
    }

    public function spin(Rotatable $rotatable)
    {
        $newDirection = $rotatable->rotateFrom(
            $this->currentDirection->getOrientation()
        );

        $this->currentDirection = DirectionFactory::createFromString($newDirection);
    }


    public function executeInstructions()
    {
        foreach ($this->instructions->getInstructions() as $instruction) {
            /** @var Instruction $instruction */
            $instruction
                ->executeInstruction($this)
            ;
        }
    }
}
