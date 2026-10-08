<?php

namespace App\Enum;

enum StatutPresence: string
{
    case Present = 'present';
    case Absent = 'absent';
    case Retard = 'retard';
}
