<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class PinataController extends Controller
{


    public function uploadFile(Request $request)
    {
        $client = new Client(['base_uri' => 'https://api.pinata.cloud']);

        $response = $client->request('POST', '/pinning/pinFileToIPFS', [
            'headers' => [
                'pinata_api_key' => '22e60ae001538c1803cd',
                'pinata_secret_api_key' => 'd62004e2875353052669a454f6bda6d86ec66c3d2a0616d2e404aebce10bf3c4',
            ],
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => fopen($request->file('file')->getPathname(), 'r'),
                ]
            ]
        ]);

        return $response->getBody()->getContents();
    }
}
