<?php


namespace App\Test\Factory\Instruction;

use App\Model\Instruction\InstructionCollection;
use App\Exception\NotValidInscrutionTypeException;
use App\Factory\Instruction\InstructionFactory;
use App\Model\Instruction\Move;
use App\Model\Instruction\RotateLeft;
use App\Model\Instruction\RotateRight;
use PHPUnit\Framework\TestCase;

class InstructionFactoryTest extends TestCase
{

    public function test_create_instruction_from_full_string() {
        $instructionsAsString = 'LMRMLML';

        $instructions = InstructionFactory::createInstructions($instructionsAsString);

        $this->assertInstanceOf(InstructionCollection::class, $instructions);

        $this->assertCount(7, $instructions);

        $firstInstruction = $instructions->offsetGet(0);

        $this->assertInstanceOf(RotateLeft::class, $firstInstruction);

        $secondInstruction =  $instructions->offsetGet(1);
        $this->assertInstanceOf(Move::class, $secondInstruction);


        $thirdInstruction = $instructions->offsetGet(2);
        $this->assertInstanceOf(RotateRight::class, $thirdInstruction);
    }

    public function test_create_instruction_with_space_in_string() {
        $instructionsAsString = ' LMR ';
        $instructions = InstructionFactory::createInstructions($instructionsAsString);
        $this->assertCount(3, $instructions);

        $firstInstruction = $instructions->offsetGet(0);
        $this->assertInstanceOf(RotateLeft::class, $firstInstruction);

    }

    public function test_create_move_instruction() {
        $instructionAsString = 'M';

        $instruction = InstructionFactory::createInstruction($instructionAsString);
        $this->assertInstanceOf(Move::class, $instruction);
    }

    public function test_create_rotate_left_instruction() {
        $instructionAsString = 'L';

        $instruction = InstructionFactory::createInstruction($instructionAsString);
        $this->assertInstanceOf(RotateLeft::class, $instruction);
    }

    public function test_create_rotate_right_instruction() {
        $instructionAsString = 'R';

        $instruction = InstructionFactory::createInstruction($instructionAsString);
        $this->assertInstanceOf(RotateRight::class, $instruction);
    }

    public function test_not_valid_instruction_from_string() {
        $instructionAsString = 'B';
        $this->expectException(NotValidInscrutionTypeException::class);
        InstructionFactory::createInstruction($instructionAsString);
    }
}