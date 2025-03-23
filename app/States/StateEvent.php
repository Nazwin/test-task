<?php

namespace App\States;

enum StateEvent: string
{
    case HAPPY = 'happy';
    case NORMAL = 'normal';
    case BAD = 'bad';
    case TERRIBLE = 'terrible';
}
