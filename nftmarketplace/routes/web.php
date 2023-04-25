<?php

use App\Http\Controllers\GuzzleController;
use App\Http\Controllers\NFTController;
use App\Http\Controllers\PinataController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Models\nft;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('client.main');
});

// MySQL
Route::get('/transaction', [TransactionController::class, 'index']);

Route::get('/nft/{id}', [TransactionController::class, 'tranNFT']);

Route::get('/result', [TransactionController::class, 'queryHistory']);

// API blockfrost

Route::get('/marketplace', [NFTController::class, 'index']);

// Search NFT Information
Route::get('/search', function () {
    return view('user.search');
});



Route::get('/result-search', [TransactionController::class, 'showNFT']);



Route::get('/view-detail-nft', [TransactionController::class, 'view_detail_nft']);

Route::get('/statistics ', [TransactionController::class, 'statistics']);

// Query assets

Route::get('/query-all-nft', [TransactionController::class, 'queryAll']);



Route::get('/result-query-stake', [TransactionController::class, 'result_query_stake']);

// Transactions get Utxo

Route::get('/utxo', [TransactionController::class, 'getUtxo']);

// Detail 

Route::get('/detail-tst', function(){
    return view('user.detailproduct');
});

Route::get('/detail-tst/utxos/{hash}', [TransactionController::class, 'utxos']);
// Blockfrost



Route::get('/check', function () {
    $headers = array(
        'http' => array(
            'method' => 'GET',
            'header' => 'project_id: mainnettClW67e7zjxBTdjgynNwmGsvyz5DCMmC'
            // 'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
        )
    );
    $context = stream_context_create($headers);
    // $json = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/epochs/latest', false, $context);
    // $json = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/pools/c1cadab46b74defa9f79b59b617fe2a50bdbce6b367e472b6109a7bc', false, $context);
    // $json = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/assets/d894897411707efa755a76deb66d26dfd50593f2e70863e1661e98a07370616365636f696e73', false, $context);
    // $json = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/txs/453a8c9fb0fd00229112accc53913485794d79cf6591b909e1db66ae95826a4e/utxos', false, $context);


    // // query info NFT
    $json = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/assets/f6c296be39a6be8507e2bf42af2cef9bff18b156311d77325035c3df436c75624d61727469616e34393330/transactions', false, $context);


    // // query transaction for that NFT
    // $json1 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/assets/cb2e7bf1fef88c0f8d679a2bd6cf9167f175e106063d6a16e457af444d79626f6f6b/transactions', false, $context);



    // // query history
    // $json2 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/assets/cb2e7bf1fef88c0f8d679a2bd6cf9167f175e106063d6a16e457af444d79626f6f6b/history', false, $context);


    // $json3 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/addresses/addr_test1qrxpzfwdwtq9dzu2swe2hlmn9dptmz7dmv8cfs64va29xa03y2thexqurrtyve545ssjqmeywq40wanpqgyl654h57pqqz9eyd', false, $context);

    // // cb2e7bf1fef88c0f8d679a2bd6cf9167f175e106063d6a16e457af444d79626f6f6b
    // // stake address: stake_test1urcj99munqwp34jxv626ggfqduj8q2hhwessyz0a22m60qs58a9tn nami wallet

    // // Query NFT history and transactions, addresses
    // $json4 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/assets/cb2e7bf1fef88c0f8d679a2bd6cf9167f175e106063d6a16e457af444d79626f6f6b/addresses', false, $context);

    // // Submit transactions

    // // $json5 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/tx/submit', false, $context);

    // $json6 = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/txs/830afec9e3fee92676e156c164c0c4d55de3a7c10d1ccb8628e46b891e89799a', false, $context);


    // $json6 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/accounts/stake_test1uzd4pvmj42xz3u00h7ld3nz23xzjhk4ge93sxaxpega4tvcqzje4m/addresses/assets', false, $context);
    // $json7 = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/accounts/stake1u892dr6t6qglvh8e8wrwxxz8qxupk2zuac2sncfw9rfyj5c2hgdlt/addresses/assets', false, $context);



    $parsedJson = json_decode($json);
    // echo gmdate('r',1679264187);
    dd($parsedJson);
});



// Test

Route::get('/tester', function(){
    return view('client.pinning');
});

Route::get('/nft-detail', function(){
    return view('user.detailproduct');
});

// Koios 

Route::get('/koios', function(){
    $url = 'https://api.koios.rest/api/v0/asset_addresses?_asset_policy=f6c296be39a6be8507e2bf42af2cef9bff18b156311d77325035c3df&_asset_name=436c75624d61727469616e34393330';

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

dd($assetSummary);
// dd($result);
});


Route::get('/stake', function(){
    $headers = array(
        'http' => array(
            'method' => 'GET',
            // 'header' => 'project_id: mainnettClW67e7zjxBTdjgynNwmGsvyz5DCMmC'

            'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
        )
    );
    // $str = request()->stake_address;
    // dd($str);
    $context = stream_context_create($headers);
    // query info NFT
    // $jsonAssets = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/accounts/stake_test1uzd4pvmj42xz3u00h7ld3nz23xzjhk4ge93sxaxpega4tvcqzje4m/addresses/assets", false, $context);
    $jsonAssets = file_get_contents("https://cardano-preprod.blockfrost.io/api/v0/assets/48664e8d76f2b15606677bd117a3eac9929c378ac547ed295518dfd574426967546f6b656e4e616d653032/transactions", false, $context);
    
    $assets = json_decode($jsonAssets);
    dd($assets);
});

