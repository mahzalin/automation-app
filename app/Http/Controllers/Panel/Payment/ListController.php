<?php

namespace App\Http\Controllers\Panel\Payment;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class ListController extends Controller
{
    public function index()
    {
        $transactions = Transaction::query()
            ->where('sender_id', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('panel.payment.index', compact('transactions'));
    }
}
