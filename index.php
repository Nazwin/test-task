<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Observers\HRManager;
use App\Observers\Manager;
use App\Programmer;
use App\States\HappyState;
use App\States\StateEvent;
use App\States\TerribleState;
use App\SubjectInterface;
use App\TeamLead;

/**
 * @var SubjectInterface $teamLead
 */
$teamLead = new TeamLead(new HappyState());

$teamLead->attach(StateEvent::TERRIBLE, new HRManager());

$teamLead->attach(StateEvent::HAPPY, new Manager());

$programmer = new Programmer();

foreach (range(1, 100) as $i) {
    $teamLead->evaluateResult($programmer->writeCode());
}