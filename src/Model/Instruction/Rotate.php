<?php
declare(strict_types=1);

namespace App\Model\Instruction;

use App\Model\Rover\Rover;

class Rotate implements Instruction, Rotatable
{
    public function executeInstruction(Rover $rover)
    {
        // TODO: Implement executeInstruction() method.
    }

    public static function rotateFrom(string $orientation)
    {
        // TODO: Implement rotateFrom() method.
    }
}
