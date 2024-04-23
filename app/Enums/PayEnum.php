<?php
namespace App\Enums;

enum PayEnum: string {
    case SINGLE = 'single';
    case Charge = 'charge';
    case CLAIM = 'claim';
}