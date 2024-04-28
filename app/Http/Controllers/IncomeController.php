<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index() {
        return Income::query()->with(['user:id,name,phone'])->with(['price:id,amount,count'])->latest()->cursorPaginate(15);
    }

    public function store(Request $request) {
        $phone = $request->phone;
        $user = null;

        if ($phone) {
            $user = User::firstOrCreate(["phone" => $phone]);
        }

        $price = Price::where('type', $request->type)->where('count', intval($request->count))->first();

        return Income::create([
            'user_id' => $user ? $user->id : 1,
            'operator_id' => '2',
            'price_id' => $price->id,
        ]);
    }
}
