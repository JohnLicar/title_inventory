<?php

namespace App\Enums;

enum CivilStatus: string
{
    case SINGLE = 'SINGLE';
    case LIVE_IN = 'LIVE-IN';
    case MARRIED = 'MARRIED';
    case WIDOWED = 'WIDOWED';
    case DIVORCED = 'DIVORCED';
}
