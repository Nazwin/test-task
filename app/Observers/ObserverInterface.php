<?php

namespace App\Observers;

use App\SubjectInterface;

interface ObserverInterface
{
    public function update(SubjectInterface $subject): void;
}