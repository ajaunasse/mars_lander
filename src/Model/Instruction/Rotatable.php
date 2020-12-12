<?php
declare(strict_types=1);

namespace App\Model\Instruction;

interface Rotatable
{
    public function rotateFrom(string $orientation): string;
}
