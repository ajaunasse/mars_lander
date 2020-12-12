<?php
declare(strict_types=1);

namespace App\Model\Instruction;

interface Rotatable
{
    public static function rotateFrom(string $orientation);
}
