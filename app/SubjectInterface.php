<?php

namespace App;

use App\Observers\ObserverInterface;
use App\States\StateEvent;

interface SubjectInterface
{
    public function attach(StateEvent $stateEvent, ObserverInterface $observer): void;

    public function detach(string $state, ObserverInterface $observer): void;

    public function notify(StateEvent $stateEvent): void;
}