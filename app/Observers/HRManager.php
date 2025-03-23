<?php

namespace App\Observers;

use App\SubjectInterface;

class HRManager implements ObserverInterface
{
    public function update(SubjectInterface $subject): void
    {
        echo 'HRManager is notified with: ' . $subject::class . ' in a ' . $subject->getState()->getName() . " mood again.\n";
    }
}