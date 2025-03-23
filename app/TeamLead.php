<?php

namespace App;

use App\Observers\ObserverInterface;
use App\States\StateEvent;
use App\States\StateInterface;

class TeamLead implements SubjectInterface, StatefulContextInterface
{
    private array $observers = [];

    public function __construct(private StateInterface $mood)
    {

    }

    public function attach(StateEvent $stateEvent, ObserverInterface $observer): void
    {
        $this->observers[$stateEvent->value][] = $observer;
    }

    public function notify(StateEvent $stateEvent): void
    {
        if (isset($this->observers[$stateEvent->value])) {
            foreach ($this->observers[$stateEvent->value] as $listener) {
                $listener->update($this);
            }
        }
    }

    public function detach(string $state, ObserverInterface $observer): void
    {
        if (isset($this->observers[$state])) {
            $this->observers[$state] = array_filter($this->observers[$state], fn($item) => $item !== $observer);
        }
    }

    public function evaluateResult(int $result): void
    {
        if (!$result) {
            $this->mood->onNegativeEvent($this);
        } else {
            $this->mood->onPositiveEvent($this);
        }
    }

    public function setState(StateInterface $state): void
    {
        $this->mood = $state;
    }

    public function getState(): StateInterface
    {
        return $this->mood;
    }
}