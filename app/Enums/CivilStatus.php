<?php

namespace App\Enums;

enum CivilStatus: string
{
    case SINGLE = 'Single';
    case LIVE_IN = 'Live-in';
    case MARRIED = 'Married';
    case WIDOWED = 'Widowed';
    case DIVORCED = 'Divorced';
}
