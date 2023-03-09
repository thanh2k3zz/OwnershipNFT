<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nft;

class NFTController extends Controller
{
    public function index()
    {
        $nfts = nft::all();
        return view('user.marketplace', [
            'nfts' => $nfts
        ]);
    }
}
