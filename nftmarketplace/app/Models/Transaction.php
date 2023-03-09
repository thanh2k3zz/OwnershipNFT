<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Transaction extends Model
{
    use HasFactory;

    protected $guards = [];

    protected $status = [
        '1' => [
            'class' => 'mint',
            'name' => "minted"
        ],
        '2' => [
            'class' => 'transaction',
            'name' => 'sold'
        ]

        ];

        public function getStatus()
    {
        return Arr::get($this->status, $this->transaction_status, "[N\A]");
    }    


}
