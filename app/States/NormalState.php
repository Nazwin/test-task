<?php

namespace App\States;

use App\StatefulContextInterface;

class NormalState implements StateInterface
{
    public function getName(): string
    {
        return 'Normal';
    }

    public function onPositiveEvent(StatefulContextInterface $subject): void
    {
        $subject->setState(new HappyState());
    }

    public function onNegativeEvent(StatefulContextInterface $subject): void
    {
        $subject->setState(new BadState());
    }
}