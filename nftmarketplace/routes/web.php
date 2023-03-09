<?php

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
    return view('welcome');
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

// Query assets

Route::get('/query-all-nft', [TransactionController::class, 'queryAll']);


Route::get('/result-query-stake', [TransactionController::class, 'result_query_stake']);

// Transactions get Utxo

Route::get('/utxo', [TransactionController::class, 'getUtxo']);

// Blockfrost



Route::get('/check', function () {
    $headers = array(
        'http' => array(
            'method' => 'GET',
            // 'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
            'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
        )
    );
    $context = stream_context_create($headers);
    // $json = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/epochs/latest', false, $context);
    // $json = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/pools/c1cadab46b74defa9f79b59b617fe2a50bdbce6b367e472b6109a7bc', false, $context);
    // $json = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/assets/d894897411707efa755a76deb66d26dfd50593f2e70863e1661e98a07370616365636f696e73', false, $context);
    // $json = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/txs/453a8c9fb0fd00229112accc53913485794d79cf6591b909e1db66ae95826a4e/utxos', false, $context);


    // query info NFT
    $json = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/assets/2af1f550b4b6ec7c13a13d71436c2a41167bb26183a34345f8414cb342616c6c6f742031', false, $context);


    // query transaction for that NFT
    $json1 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/assets/cb2e7bf1fef88c0f8d679a2bd6cf9167f175e106063d6a16e457af444d79626f6f6b/transactions', false, $context);



    // query history
    $json2 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/assets/cb2e7bf1fef88c0f8d679a2bd6cf9167f175e106063d6a16e457af444d79626f6f6b/history', false, $context);


    $json3 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/addresses/addr_test1qrxpzfwdwtq9dzu2swe2hlmn9dptmz7dmv8cfs64va29xa03y2thexqurrtyve545ssjqmeywq40wanpqgyl654h57pqqz9eyd', false, $context);

    // cb2e7bf1fef88c0f8d679a2bd6cf9167f175e106063d6a16e457af444d79626f6f6b
    // stake address: stake_test1urcj99munqwp34jxv626ggfqduj8q2hhwessyz0a22m60qs58a9tn nami wallet

    // Query NFT history and transactions, addresses
    $json4 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/assets/cb2e7bf1fef88c0f8d679a2bd6cf9167f175e106063d6a16e457af444d79626f6f6b/addresses', false, $context);

    // Submit transactions

    // $json5 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/tx/submit', false, $context);

    $json6 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/txs/a26c6b9feff9def3a209e4282bb47d4c675eedb7eb29f85e94db63540c378ad7', false, $context);


    $json6 = file_get_contents('https://cardano-preprod.blockfrost.io/api/v0/accounts/stake_test1uzd4pvmj42xz3u00h7ld3nz23xzjhk4ge93sxaxpega4tvcqzje4m/addresses/assets', false, $context);

    $parsedJson = json_decode($json);
    dd($parsedJson);
});

// Route::get('/view', function(){
//     return view('client.viewHistory');
// });















Route::get('/connect', function () {
    return view('user.connectwallet');
});


Route::get('/createAddress', function () {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://cardano-preprod.blockfrost.io/api/v0/addresses");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS"
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    // $address = json_decode($response, true)["address"];
    dd(json_decode($response, true));
});


Route::get('/createKeyPair', function () {

    $ch = curl_init();
    $address = 'addr_test1qrxpzfwdwtq9dzu2swe2hlmn9dptmz7dmv8cfs64va29xa03y2thexqurrtyve545ssjqmeywq40wanpqgyl654h57pqqz9eyd';
    curl_setopt($ch, CURLOPT_URL, "https://cardano-preprod.blockfrost.io/api/v0/addresses/{$address}/keys");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS"
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    dd($response);

    $keyPair = json_decode($response, true);
    $publicKey = $keyPair["cbor_hex"];
    $privateKey = $keyPair["private_key_bech32"];

});


// get Address

// use Blockfrost\Api\NftApi;
// use Blockfrost\ApiException;
// use Blockfrost\Configuration;
// use Blockfrost\HeaderSelector;

// Route::get('/build-transaction', function(){
//     require_once('vendor/autoload.php');


// // Set up the Blockfrost configuration using your API key
// $config = new Configuration();
// $config->setApiKey('project_id', 'mainnettClW67e7zjxBTdjgynNwmGsvyz5DCMmC');

// // Set up the NFT API client
// $apiInstance = new NftApi(
//     new GuzzleHttp\Client(),
//     $config,
//     new HeaderSelector()
// );

// // Mint your NFT using the Blockfrost API
// try {
//     $mintRequest = array(
//         "name" => "My NFT",
//         "policy_id" => "cb2e7bf1fef88c0f8d679a2bd6cf9167f175e106063d6a16e457af44",
//         "quantity" => 1,
//         "metadata" => "https://my-nft-metadata.com/metadata.json"
//     );

//     $result = $apiInstance->postMintNft($mintRequest);
//     print_r($result);
// } catch (ApiException $e) {
//     echo 'Exception when calling NftApi->postMintNft: ', $e->getMessage(), PHP_EOL;
// }

// });

Route::post('/pinata/upload', [PinataController::class, 'uploadFile']);
