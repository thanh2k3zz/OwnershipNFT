<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Metadata;
use App\Models\nft;

class TransactionController extends Controller
{
    // Blockfrost API
    public function showNFT()
        {
        $headers = array(
            'http' => array(
                'method' => 'GET',
                'header' => 'project_id: mainnettClW67e7zjxBTdjgynNwmGsvyz5DCMmC'
                // 'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
            )
        );

        // Get information
        $policyID = request()->key2;
        $asset_name = request()->key1;
        $str = request()->key2 . request()->key1;
        $context = stream_context_create($headers);
        // query info NFT
        $jsonNFT = file_get_contents("https://cardano-mainnet.blockfrost.io/api/v0/assets/{$str}", false, $context);
        $NFT = json_decode($jsonNFT);

        $jsontransactions = file_get_contents("https://cardano-mainnet.blockfrost.io/api/v0/assets/{$str}/transactions", false, $context);
        $transactions = json_decode($jsontransactions);


        // Get date NFT 

        $jsonNftHistory = file_get_contents("https://cardano-mainnet.blockfrost.io/api/v0/assets/{$str}/history", false, $context);
        $NFThistory = json_decode($jsonNftHistory);

        foreach ($NFThistory as $item) {
            if ($item->action == "minted") {
                $hash = $item->tx_hash;
            }
        }

        $jsontsx = file_get_contents("https://cardano-mainnet.blockfrost.io/api/v0/txs/{$hash}", false, $context);
        $NFTtsx = json_decode($jsontsx);

        // Last owner
        $url = "https://api.koios.rest/api/v0/asset_nft_address?_asset_policy={$policyID}&_asset_name={$asset_name}";
        // dd($policyID, $asset_name);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = array(
            'accept: application/json'
        );

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($result, true);

    



        $url = 'https://api.koios.rest/api/v0/asset_summary?_asset_policy=f6c296be39a6be8507e2bf42af2cef9bff18b156311d77325035c3df&_asset_name=436c75624d61727469616e34393330';

        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $headers = array(
            'accept: application/json'
        );
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        
        curl_close($ch);
        
        // echo $result;
        
        $assetSummary = json_decode($result, true);
        return view('user.search', compact('NFT', 'transactions', 'NFTtsx', 'data', 'assetSummary'));
    }

    // public function showNFT(){
    //     $headers = array(
    //         'http' => array(
    //             'method' => 'GET',
    //         // 'header' => 'project_id: mainnettClW67e7zjxBTdjgynNwmGsvyz5DCMmC'
    //             'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
    //         )
    //     );

    //     // Get information
    //     $policyID = request()->key2;
    //     $asset_name = request()->key1;
    //     $str = request()->key2.request()->key1;
    //     $context = stream_context_create($headers);
    //     // query info NFT
    //     $jsonNFT = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/assets/{$str}", false, $context);
    //     $NFT = json_decode($jsonNFT);

    //     $jsontransactions = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/assets/{$str}/transactions", false, $context);
    //     $transactions = json_decode($jsontransactions);


    //     // Get date NFT 

    //     $jsonNftHistory = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/assets/{$str}/history", false, $context);
    //     $NFThistory = json_decode($jsonNftHistory);

    //     foreach ($NFThistory as $item) {
    //         if($item->action == "minted"){
    //             $hash = $item->tx_hash;
    //         }
    //     }

    //     $jsontsx = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/txs/{$hash}", false, $context);
    //     $NFTtsx = json_decode($jsontsx);

    //     // Last owner


    //     return view('user.search', compact('NFT', 'transactions', 'NFTtsx'));
    // }





    public function view_detail_nft()
        {
            $str = request()->tx_hash;
            $headers = array(
                'http' => array(
                    'method' => 'GET',
                    'header' => 'project_id: mainnettClW67e7zjxBTdjgynNwmGsvyz5DCMmC'
                    // 'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
                )
            );
            $context = stream_context_create($headers);
            // query info NFT
            $jsonDetailTransaction = file_get_contents("https://cardano-mainnet.blockfrost.io/api/v0/txs/{$str}", false, $context);
            $view_detail_tst = json_decode($jsonDetailTransaction);
            $jsonDetailTransactionUtxos = file_get_contents("https://cardano-mainnet.blockfrost.io/api/v0/txs/{$str}/utxos", false, $context);
            $view_detail_utxos = json_decode($jsonDetailTransactionUtxos);
            // dd($view_detail);
            // foreach ($view_detail as $key => $item) {
            //         echo $item->hash;
            //         echo "</br>";
            // }


            // dd(".");

            // dd($view_detail_tst);

            return view('client.viewDetail', compact('view_detail_tst'));
        }

    public function utxos($hash)
        {
            // dd($hash);
            $headers = array(
                'http' => array(
                    'method' => 'GET',
                    'header' => 'project_id: mainnettClW67e7zjxBTdjgynNwmGsvyz5DCMmC'
                    // 'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
                )
            );
            $context = stream_context_create($headers);

            $jsonDetailTransactionUtxos = file_get_contents("https://cardano-mainnet.blockfrost.io/api/v0/txs/{$hash}/utxos", false, $context);
            $view_detail_utxos = json_decode($jsonDetailTransactionUtxos);
            // dd($view_detail_utxos);
            $str = $view_detail_utxos->hash;
            $jsonDetailTransaction = file_get_contents("https://cardano-mainnet.blockfrost.io/api/v0/txs/{$str}", false, $context);
            $view_detail_tst = json_decode($jsonDetailTransaction);

            $token_names_input = [];
            $token_names_output = [];
            $total_input = 0;
            $total_output = 0;

            foreach ($view_detail_utxos->inputs as $itemOut) {
                foreach ($itemOut->amount as $itemIn) {
                    if ($itemIn->unit == "lovelace") {
                        $total_input += $itemIn->quantity;
                    } else {
                        $jsonNFT = file_get_contents("https://cardano-mainnet.blockfrost.io/api/v0/assets/{$itemIn->unit}", false, $context);
                        $NFT = json_decode($jsonNFT);
                        array_push($token_names_input, $NFT->onchain_metadata->name);
                    }
                }
            }


            foreach ($view_detail_utxos->outputs as $itemOut) {
                foreach ($itemOut->amount as $itemIn) {
                    if ($itemIn->unit == "lovelace") {
                        $total_output += $itemIn->quantity;
                    } else {
                        $jsonNFT = file_get_contents("https://cardano-mainnet.blockfrost.io/api/v0/assets/{$itemIn->unit}", false, $context);
                        $NFT = json_decode($jsonNFT);
                        array_push($token_names_output, $NFT->onchain_metadata->name);
                    }
                }
            }

            dd($view_detail_utxos);
            return view('client.utxos', compact('view_detail_utxos', 'view_detail_tst',  'total_input', 'total_output', 'token_names_input', 'token_names_output'));
        }

    public function queryAll()
    {
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
            // foreach($asset as $item){
            // dd(empty($asset[2]->onchain_metadata));
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


    public function statistics()
    {
        return view('user.statistics');
    }
}
