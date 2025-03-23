<?php

namespace App\States;

use App\StatefulContextInterface;

class TerribleState implements StateInterface
{
    public function getName(): string
    {
        return 'Terrible';
    }

    public function onPositiveEvent(StatefulContextInterface $subject): void
    {
        $subject->setState(new BadState());
    }

    public function onNegativeEvent(StatefulContextInterface $subject): void
    {
        $subject->notify(StateEvent::TERRIBLE);
    }
}