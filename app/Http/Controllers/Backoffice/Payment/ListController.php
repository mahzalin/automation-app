<?php

namespace App\Http\Controllers\Backoffice\Payment;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class ListController extends Controller
{
    public function index()
    {
        $transactions = Transaction::query()
            ->orderBy('created_at', 'DESC')
            ->get();

        if (empty($transactions) || count($transactions) == 0) {
            return view('backoffice.payment.index', compact('transactions'))
                ->with('message', 'You dont have any transaction');
        }

        return view('backoffice.payment.index', compact('transactions'));
    }
}
