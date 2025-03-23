<?php

namespace App\States;

use App\StatefulContextInterface;

class BadState implements StateInterface
{
    public function getName(): string
    {
        return 'Bad';
    }

    public function onPositiveEvent(StatefulContextInterface $subject): void
    {
        $subject->setState(new NormalState());
    }

    public function onNegativeEvent(StatefulContextInterface $subject): void
    {
        $subject->setState(new TerribleState());
    }
}