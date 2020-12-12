<?php
declare(strict_types=1);

namespace App\Model\Rover;

class RoverCollection
{
    protected array $rovers = [];


    public function add(Rover $rover)
    {
        $this->rovers[] = $rover;
    }

    public function getRovers()
    {
        return $this->rovers;
    }

    public function execute()
    {
        foreach ($this->rovers as $rover) {
            /** @var Rover $rover */
            $rover->executeInstructions();
        }
    }
}
