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

/*
*****************************************************
******************Mainet Network********************
*****************************************************
*/
Route::get('/track', [TransactionController::class, 'track']);

Route::get('/result-search-mainnet', [TransactionController::class, 'MainnetshowNFT']);

Route::get('/mainnet-view-detail-nft', [TransactionController::class, 'mainnet_view_detail_nft']);

Route::get('/mainnet-detail-tst/utxos/{hash}', [TransactionController::class, 'mainnet_utxos']);

/*
*****************************************************
******************Testnet Network********************
*****************************************************
*/


// Search NFT Information
Route::get('/search', function () {
    return view('user.search');
});

Route::get('/result-search', [TransactionController::class, 'showNFT']);

Route::get('/view-detail-nft', [TransactionController::class, 'view_detail_nft']);


// Query all assets

Route::get('/query-all-nft', [TransactionController::class, 'queryAll']);

Route::get('/result-query-stake', [TransactionController::class, 'result_query_stake']);

// Route::get('/assets/{asset}', [TransactionController::class, 'search']);


// Query UTXOs
Route::get('/detail-tst/utxos/{hash}', [TransactionController::class, 'utxos']);

// Test API
Route::get('/check', function () {
    $headers = array(
        'http' => array(
            'method' => 'GET',
            'header' => 'project_id: mainnettClW67e7zjxBTdjgynNwmGsvyz5DCMmC'
            // 'header' => 'project_id: preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS'
            )
        );
        $context = stream_context_create($headers);
        $json = file_get_contents('https://cardano-mainnet.blockfrost.io/api/v0/assets/f6c296be39a6be8507e2bf42af2cef9bff18b156311d77325035c3df436c75624d61727469616e34393330/transactions', false, $context);
        $parsedJson = json_decode($json);
        dd($parsedJson);
    });
    
    // Detail NFT Page 
    Route::get('/nft-detail', function(){
        return view('user.detailproduct');
});

// Statistics market
Route::get('/statistics ', [TransactionController::class, 'statistics']);



