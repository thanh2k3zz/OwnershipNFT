<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Metadata;
use App\Models\nft;

class TransactionController extends Controller
{


    public function index()
    {
        
        $transactions = Transaction::all();
        dd($transactions);
    }

    public function tranNFT($id)
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
        // dd($transactions);
        // foreach($reciever as $item){
        //     if(empty($item[0])) echo 'true';
        //     if(!empty($item[0])){
        //         echo 'false';
        //     }
        // }

        // $i = 0;
        // foreach($transactions as $item){
        //     // if($reciever == []) echo 'mint';
        //     echo $reciever[0][0]->name == [];
        //     echo '</br>';
        //     $i++;
        // }
        



        return view('user.viewHistory', compact('sender', 'reciever', 'transactions', 'metadata', 'nft'));
    }

    public function queryHistory()
    {
        $str = request()->key2.request()->key1;
        $data = nft::where(['policyid' => request()->key2, 'token_name' => request()->key1])->get();     
        
        $sender = [];
        $reciever = [];
        $transactions = Transaction::where('nft_id', $data[0]->id)->get();
        $nft = nft::find($data[0]->id);
        // dd($nft->metadata_id);
        // $metadata = Metadata::all();
        $metadata = Metadata::where('id', $nft->metadata_id)->get();
        // dd($metadata[0]->name);
        foreach($transactions as $transaction){

            array_push($sender, User::where('id', $transaction->from_account)->get()) ;
            array_push($reciever, User::where('id', $transaction->to_account)->get()) ;
        }



        
        return view('user.viewHistory', compact('sender', 'reciever', 'transactions', 'metadata', 'nft'));
    
    }

    public function showNFT(){
        $headers = array(
            'http' => array(
                'method' => 'GET',
                // 'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
                'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
            )
        );
        $str = request()->key2.request()->key1;
        $context = stream_context_create($headers);
        // query info NFT
        $jsonNFT = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/assets/{$str}", false, $context);
        $NFT = json_decode($jsonNFT);
        $jsontransactions = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/assets/{$str}/transactions", false, $context);
        $transactions = json_decode($jsontransactions);
        

        // dd('.');
        // dd($transactions);
        // dd($NFT);
        // dd($str);

        // echo '<img src="https://ipfs.io/ipfs/' . htmlspecialchars(str_replace('ipfs:/', '',$NFT->onchain_metadata->image)) . '" />';
        // dd('.');

        return view('user.search', compact('NFT', 'transactions'));
    }


    public function view_detail_nft()
    {
        $str = request()->tx_hash;
        $headers = array(
            'http' => array(
                'method' => 'GET',
                // 'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
                'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
            )
        );
        $context = stream_context_create($headers);
        // query info NFT
        $jsonDetailTransaction = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/txs/{$str}/utxos", false, $context);
        $view_detail = json_decode($jsonDetailTransaction);

        // dd($view_detail);
        // foreach ($view_detail as $key => $item) {
        //         echo $item->hash;
        //         echo "</br>";
        // }


        // dd(".");

        // dd($view_detail);

        return view('client.viewDetail', compact('view_detail'));
    }

    public function queryAll()
    {
        // $headers = array(
        //     'http' => array(
        //         'method' => 'GET',
        //         // 'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
        //         'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
        //     )
        // );
        // $str = request()->stake_address;
        // $context = stream_context_create($headers);
        // // query info NFT
        // $jsonAssets = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/account/{$str}/addresses/assets", false, $context);
        // $assets = json_decode($jsonAssets);
        return view('client.stakeAdd');
    }

    public function result_query_stake()
    {
        $asset = [];
        $headers = array(
            'http' => array(
                'method' => 'GET',
                // 'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
                'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
            )
        );
        $str = request()->stake_address;
        // dd($str);
        $context = stream_context_create($headers);
        // query info NFT
        $jsonAssets = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/accounts/{$str}/addresses/assets", false, $context);
        $assets = json_decode($jsonAssets);
        foreach ($assets as $key => $item) {
            $jsonAsset = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/assets/{$item->unit}", false, $context);
            array_push($asset,  json_decode($jsonAsset));
        }
        // dd($asset);
        // foreach ($asset as $key => $item) {
            //     echo $item;
            //     echo "</br>";
            // dd(!empty($asset));
        // }

        // dd('.');

        


        return view('client.stakeAdd', compact('asset'));
    }


    public function getUtxo()
    {
        $headers = array(
            'http' => array(
                'method' => 'GET',
                // 'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
                'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
            )
        );
        $context = stream_context_create($headers);
        // query info NFT
        $jsonSpecificTst = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/txs/1bf0f2f596d78cb72c071a0aa1fe8efa4fd137ee8460f5c9e09a4010e05dd613/utxos", false, $context);
        $tst = json_decode($jsonSpecificTst);

        dd($tst);
        
    }
}
