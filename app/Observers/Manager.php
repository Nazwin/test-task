<?php

namespace App\Observers;

use App\SubjectInterface;

class Manager implements ObserverInterface
{
    public function update(SubjectInterface $subject): void
    {
        echo 'Manager is notified with: ' . $subject::class . ' in a ' . $subject->getState()->getName() . " mood again.\n";
    }
}