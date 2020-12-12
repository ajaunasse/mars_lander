<?php

declare(strict_types=1);

namespace App\Model\Instruction;

class InstructionCollection implements \Countable, \ArrayAccess
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

    public function count()
    {
        return sizeof($this->instructions);
    }

    public function offsetExists($offset)
    {
        return isset($this->instructions[$offset]);
    }

    public function offsetGet($offset)
    {
        if(!$this->offsetExists($offset)) {
            //Todo: throw exception
        }

        return $this->instructions[$offset];

    }

    public function offsetSet($offset, $value)
    {
        if(!$this->offsetExists($offset)) {
            //Todo: throw exception
        }

        $this->instructions[$offset] = $value;

    }

    public function offsetUnset($offset)
    {
        if(!$this->offsetExists($offset)) {
            //Todo: throw exception
        }

        unset($this->instructions[$offset]);

    }
}
