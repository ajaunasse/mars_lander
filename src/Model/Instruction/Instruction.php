<?php
declare(strict_types=1);

namespace App\Model\Instruction;

use App\Model\Rover\Rover;

interface Instruction
{
    const MOVE = 'M';
    const ROTATE_RIGHT = "R";
    const ROTATE_LEFT = "L";

    public function executeInstruction(Rover $rover);
}
