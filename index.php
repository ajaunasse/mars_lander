<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Executer\InputExecuter;
use App\Executer\OutputExecuter;

CONST DATA_FILE = 'input.txt';

$resource = fopen(DATA_FILE, "r");

if($resource) {

    $rovers = InputExecuter::handle($resource);

    fclose($resource);

    $output = OutputExecuter::handle($rovers);

    echo $output;
}