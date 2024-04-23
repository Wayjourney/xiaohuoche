<?php

namespace App\Http\Controllers;

use App\Models\Price;

class PriceController extends Controller
{
    public function __invoke() {
        return Price::all();
    }
}
