<?php

namespace App\Http\Controllers\Backoffice\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\Payment\EditRequest;
use App\Http\Requests\Backoffice\Payment\EditStatusRequest;
use App\Models\Transaction;
use App\Models\User;

class EditController extends Controller
{
    public function getEdit($transactionID)
    {
        $transaction = Transaction::query()->where('id', $transactionID)
            ->first();

        $users = User::query()->orderBy('created_at', 'DESC')
            ->get();

        if (empty($transaction) || empty($users) || count($users) == 0) {

            return view('backoffice.payment.edit')
                ->with(compact('users'))
                ->with(compact('transaction'))
                ->with('message', 'Transaction not found');
        }

        return view('backoffice.payment.edit')->with(compact('users'))->with(compact('transaction'));
    }

    public function edit($transactionID, EditRequest $request)
    {
        $inputs = $request->all();

        Transaction::query()->where('id', $transactionID)
            ->update([
                'receiver_id' => $inputs['receiverID'],
                'amount' => $inputs['amount']
            ]);

        return redirect('/backoffice/payment');
    }

    public function changeStatus($transactionID, EditStatusRequest $request)
    {
        $inputs = $request->all();
        if ($inputs['isAccepted']) {
            $status = Transaction::TRX_CONFIRM;
        } else {
            $status = Transaction::TRX_REJECTED;
        }

        Transaction::query()->where('id', $transactionID)
            ->update([
                'status' => Transaction::getStatusIdByName($status)
            ]);

        return redirect('/backoffice/payment');
    }
}
