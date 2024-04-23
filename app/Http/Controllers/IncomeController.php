<?php

namespace App\Http\Controllers;

use App\Models\Income;

class IncomeController extends Controller
{
    public function index() {
        return Income::query()->with(['user:id,name,phone'])->with(['price:id,amount,count'])->orderBy('created_at', 'desc')->cursorPaginate(15);
    }
}
