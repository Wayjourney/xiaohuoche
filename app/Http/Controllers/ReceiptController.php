<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index() {
        return Receipt::select(['id', 'user_id', 'valid', 'created_at'])->with(['user:id,openid,name,phone'])->latest()->cursorPaginate(15);
    }

    public function confirm(Receipt $receipt) {
        if ($receipt->valid) {
            $receipt->update(['valid' => 0]);
        }
        return $receipt;
    }
}
