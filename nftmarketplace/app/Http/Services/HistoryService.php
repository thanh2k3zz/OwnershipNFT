<?php


namespace App\Http\Services;

use App\Models\nft;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Metadata;



// use Illuminate\Support\Arr;

class CartService
{
    public function historyNFT($id)
    {
        $sender = [];
        $reciever = [];
        $transactions = Transaction::where('nft_id', $id)->get();
        $nft = nft::find($id);
        // dd($nft->metadata_id);
        // $metadata = Metadata::all();
        $metadata = Metadata::where('id', $nft->metadata_id)->get();
        // dd($metadata[0]->name);
        foreach($transactions as $transaction){

            array_push($sender, User::where('id', $transaction->from_account)->get()) ;
            array_push($reciever, User::where('id', $transaction->to_account)->get()) ;
        }




        return view('user.viewHistory', compact('sender', 'reciever', 'transactions', 'metadata'));
    }
}
