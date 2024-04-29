<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function show(string $openid) {
        $user = User::where('openid', $openid)->first();
        if (!$user) {
            $user = User::create([
                'openid' => $openid
            ]);
        }
        return $user;
    }

    public function search(Request $request) {
        $request->validate([
            'phone' => 'required|numeric'
        ]);

        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            throw new NotFoundHttpException();
        }

        return $user;
    }

    public function decrease(Request $request) {
        $user = User::where('openid', $request->openid)->first();
        if ($user->count > 0) {
            DB::transaction(function() use($user, $request) {
                $user->decrement('count');
                Receipt::create([
                    'user_id' => $request->openid,
                    'operator_id' => User::where('token', $request->token),
                    'price_id' => $request->price_id
                ]);
            });
        }
        return $user;
    }
}
