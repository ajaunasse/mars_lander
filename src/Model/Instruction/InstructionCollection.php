<?php

declare(strict_types=1);

namespace App\Model\Instruction;

class InstructionCollection
{
    protected array $instructions = [];

    public function add(Instruction $instruction)
    {
        $this->instructions[] = $instruction;
    }

    public function getInstructions()
    {
        return $this->instructions;
    }
}
