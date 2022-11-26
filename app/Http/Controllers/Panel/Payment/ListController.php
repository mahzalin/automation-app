<?php

namespace App\Http\Controllers\Panel\Payment;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class ListController extends Controller
{
    // List of user payment requests
    public function index()
    {
        $transactions = Transaction::query()
            ->where('sender_id', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->get();

        if (empty($transactions) || count($transactions) == 0) {
            return view('panel.payment.index', compact('transactions'))
                ->with('message', 'You dont have any transaction');
        }

        return view('panel.payment.index', compact('transactions'));
    }
}
