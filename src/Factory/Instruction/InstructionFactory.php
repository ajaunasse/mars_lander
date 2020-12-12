<?php
declare(strict_types=1);

namespace App\Factory\Instruction;

use App\Model\Instruction\Instruction;
use App\Model\Instruction\InstructionCollection;
use App\Exception\NotValidInscrutionTypeException;
use App\Model\Instruction\Move;
use App\Model\Instruction\RotateLeft;
use App\Model\Instruction\RotateRight;

class InstructionFactory
{
    public static function createInstructions(string $data): InstructionCollection
    {
        $instructionsAsArray = str_split(trim($data));

        $instructions = new InstructionCollection();

        foreach ($instructionsAsArray as $instructionAsString) {
            $instructions->add(
                self::createInstruction($instructionAsString)
            );
        }

        return $instructions;
    }

    public static function createInstruction(string $data) : Instruction
    {
        if (Instruction::MOVE == $data) {
            return new Move();
        }

        if (Instruction::ROTATE_RIGHT == $data) {
            return new RotateRight();
        }

        if (Instruction::ROTATE_LEFT == $data) {
            return new RotateLeft();
        }

        throw new NotValidInscrutionTypeException(
            sprintf('%s instruction is not valid', $data)
        );
    }
}
