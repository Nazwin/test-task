<?php

namespace App\States;

use App\StatefulContextInterface;

class HappyState implements StateInterface
{
    public function getName(): string
    {
        return 'Happy';
    }

    public function onPositiveEvent(StatefulContextInterface $subject): void
    {
        $subject->notify(StateEvent::HAPPY);
    }

    public function onNegativeEvent(StatefulContextInterface $subject): void
    {
        $subject->setState(new NormalState());
    }
}