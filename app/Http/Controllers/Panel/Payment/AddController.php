<?php

namespace App\Http\Controllers\Panel\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Payment\AddRequest;
use App\Models\File;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Arr;

class AddController extends Controller
{
    public function getAddRequest()
    {
        $users = User::query()
            ->select('id', 'name', 'email')
            ->whereNot('id', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->get();

        if (empty($users) || count($users) == 0) {
            return view('panel.payment.add', compact('users'))
                ->with('message', 'We dont have any user except you');
        }

        return view('panel.payment.add', compact('users'));
    }

    public function addRequest(AddRequest $request)
    {
        $inputs = $request->all();

        $transaction = Transaction::query()->create([
            'sender_id' => auth()->id(),
            'receiver_id' => $inputs['receiverID'],
            'amount' => $inputs['amount'],
            'status' => Transaction::getStatusIdByName(Transaction::TRX_PENDING),
        ]);

        if (Arr::has($request, 'files')) {
            foreach($request->file('files') as $file) {
                $path = $file->store('files');

                File::query()->create([
                    'transaction_id' => $transaction->id,
                    'size' => $file->getSize(),
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                ]);
            }
        }

        return redirect('/payment');
    }
}
