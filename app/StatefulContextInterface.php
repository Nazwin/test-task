<?php

namespace App;

use App\States\StateInterface;

interface StatefulContextInterface
{
    public function getState(): StateInterface;

    public function setState(StateInterface $state): void;
}