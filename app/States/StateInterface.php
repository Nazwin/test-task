<?php

namespace App\States;

use App\StatefulContextInterface;

interface StateInterface
{
    public function getName(): string;
    
    public function onPositiveEvent(StatefulContextInterface $subject): void;

    public function onNegativeEvent(StatefulContextInterface $subject): void;
}