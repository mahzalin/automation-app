<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'amount' => 1000000,
                'status' => 1,
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'amount' => 2500000,
                'status' => 2,
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'amount' => 3000000,
                'status' => 0,
            ],
        ];

        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
}
