<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nft extends Model
{
    use HasFactory;


    protected $guards = [];


    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'nft_id', 'id');
    }
}
