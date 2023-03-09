<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BlockfrostController extends Controller
{
    private Client $client;

    public const MAINNET_URI = 'https://cardano-mainnet.blockfrost.io/api/v0/';
    public const TESTNET_URI = 'https://cardano-testnet.blockfrost.io/api/v0/';

    public function __construct($apiKey, $baseUri)
    {
        $this->client = new Client([
            'base_uri' => $baseUri,
            'headers' => [
                'Accept' => 'application/json',
                'project_id' => $apiKey,
            ],
        ]);
    }

    /**
     * Instantiate self
     *
     * @param $apiKey
     * @param $baseUri
     * @return BlockfrostClient
     */
    public static function make($apiKey, $baseUri): BlockfrostController
    {
        return new self($apiKey, $baseUri);
    }

    /**
     * @throws GuzzleException
     */
    private function get($endpoint, $params = null)
    {
        return json_decode($this->client->get($endpoint, ['query' => $params])
            ->getBody()
            ->getContents()
        );
    }

    /**
     * @throws GuzzleException
     */
    public function health()
    {
        return $this->get('health');
    }

    /**
     * @throws GuzzleException
     */
    public function clock()
    {
        return $this->get('health/clock');
    }

    /**
     * @throws GuzzleException
     */
    public function metrics()
    {
        return $this->get('metrics');
    }

    /**
     * @throws GuzzleException
     */
    public function metricsEndpoints()
    {
        return $this->get('metrics/endpoints');
    }

    /**
     * @throws GuzzleException
     */
    public function account($stakeAddress)
    {
        return $this->get('accounts/' . $stakeAddress);
    }

    /**
     * @throws GuzzleException
     */
    public function accountRewards($stakeAddress, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('accounts/' . $stakeAddress . '/rewards', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function accountHistory($stakeAddress, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('accounts/' . $stakeAddress . '/history', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function accountDelegations($stakeAddress, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('accounts/' . $stakeAddress . '/delegations', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function accountRegistrations($stakeAddress, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('accounts/' . $stakeAddress . '/registrations', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function accountWithdrawals($stakeAddress, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('accounts/' . $stakeAddress . '/withdrawals', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function accountMirs($stakeAddress, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('accounts/' . $stakeAddress . '/mirs', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function accountAddresses($stakeAddress, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('accounts/' . $stakeAddress . '/addresses', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function accountAddressesAssets($stakeAddress, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('accounts/' . $stakeAddress . '/addresses/assets', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function address($address)
    {
        return $this->get('addresses/' . $address);
    }

    /**
     * @throws GuzzleException
     */
    public function addressDetails($address)
    {
        return $this->get('addresses/' . $address . '/total');
    }

    /**
     * @throws GuzzleException
     */
    public function addressUtxos($address, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('addresses/' . $address . '/utxos', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function addressTransactions($address, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('addresses/' . $address . '/transactions', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function assets($count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('assets', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function asset($asset)
    {
        return $this->get('assets/' . $asset);
    }

    /**
     * @throws GuzzleException
     */
    public function assetHistory($asset, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('assets/' . $asset . '/history', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function assetTransactions($asset, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('assets/' . $asset . '/transactions', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function assetAddresses($asset, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('assets/' . $asset . '/addresses', [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function assetsPolicy($policy, $count = 100, $page = 1, $order = 'asc')
    {
        return $this->get('assets/policy/' . $policy, [
            'count' => $count,
            'page' => $page,
            'order' => $order,
        ]);
    }

}
