<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class GuzzleController extends Controller
{
    public function mintNft(Request $request)
    {
        // Set up the Guzzle client with your Blockfrost API key
        $blockfrost_endpoint = 'https://cardano-preprod.blockfrost.io';
        $blockfrost_api_key = 'preprodARqAklczYCnLKURn4cCtrIvfzPKHPgpS';
        $client = new Client([
            'base_uri' => $blockfrost_endpoint,
            'headers' => [
                'project_id' => $blockfrost_api_key,
                'content-type' => 'application/json'
            ]
        ]);

        // Mint the NFT using Blockfrost API
        try {
            $response = $client->post('/api/v0/cardano/assets/mint', [
                'json' => [
                    'policy_id' => 'cb2e7bf1fef88c0f8d679a2bd6cf9167f175e106063d6a16e457af44',
                    'asset_name' => '506c616e6574',
                    'quantity' => 1,
                    'metadata' => [
                        'name' => 'Planet ',
                        'description' => 'Your NFT description',
                        'image' => 'https://cdn.pixabay.com/photo/2022/03/01/02/51/galaxy-7040416__480.png',
                        'properties' => [
                            'color' => 'red',
                            'size' => 'medium',
                            'material' => 'paper'
                        ]
                    ]
                ]
            ]);
            $minted_nft_data = json_decode($response->getBody(), true);
            $tx_hash = $minted_nft_data['tx_hash'];
            $asset_id = $minted_nft_data['asset'][0]['asset'];
            // Do something with the tx_hash and asset_id
        } catch (RequestException $e) {
            // Handle error
        }
    }


    public function test()
    {

        require 'vendor/autoload.php'; // Load the GuzzleHTTP library

        // Set up the Blockfrost API client
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://cardano-mainnet.blockfrost.io/api/v0/',
            'headers' => [
                'project_id' => 'YOUR_BLOCKFROST_API_KEY_HERE',
            ],
        ]);

        // Replace with your own wallet address
        $walletAddress = 'YOUR_WALLET_ADDRESS_HERE';

        // Get all UTXOs associated with the wallet address
        $response = $client->request('GET', "addresses/{$walletAddress}/utxos");
        $utxos = json_decode($response->getBody(), true);

        // Filter out all non-NFT and non-token UTXOs
        $nfts = array_filter($utxos, function ($utxo) {
            return isset($utxo['asset']['policy']) && isset($utxo['asset']['name']);
        });

        $tokens = array_filter($utxos, function ($utxo) {
            return !isset($utxo['asset']['policy']) && !isset($utxo['asset']['name']);
        });

        // Print out the NFTs and tokens
        echo "NFTs:\n";
        foreach ($nfts as $nft) {
            echo "- {$nft['amount']} units of asset ID {$nft['asset']['asset']}\n";
        }

        echo "\nTokens:\n";
        foreach ($tokens as $token) {
            echo "- {$token['amount']} units of currency\n";
        }
    }
}
