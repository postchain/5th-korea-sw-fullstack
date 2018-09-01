<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use Graze\GuzzleHttp\JsonRpc\Client;
use Graze\GuzzleHttp\JsonRpc\Exception\RequestException;
use Graze\GuzzleHttp\JsonRpc\Message;

const URL = 'http://127.0.0.1:9000/api/v3';
class BlockController extends Controller
{
    public function lastBlock() {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', URL, [
            'json' => [
                'jsonrpc' => '2.0',
                'id' => 1234,
                'method' => 'icx_getLastBlock'
            ]
        ]);
        echo $res->getBody();
    }

    public function store($category, $email) {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', URL, [
            'json' => [
                "jsonrpc" => "2.0",
                "id" => 1234,
                "method" => "icx_sendTransaction",
                "params" => [
                    "version" => "0x3",
                    "from" => "hxaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                    "to" => "cx0000000000000000000000000000000000000000",
                    "stepLimit" => "0x12345",
                    "timestamp" => "0x563a6cf330136",
                    "nid" => "0x3f",
                    "nonce"=> "0x".rand(1, 3),
                    "signature" => 
                    "VAia7YZ2Ji6igKWzjR2YsGa2m53nKPrfK7uXYW78QLE+ATehAVZPC40szvAiA6NEU5gCYB4c4qaQzqDh2ugcHgA=",
                    "dataType" => "call",
                    'data' => [
                        "method" => $category,
                        'params' => [
                            "email" => $email,
                            "random" => rand(1,10000000)
                        ]
                    ]
                ]
            ]
        ]);
        return json_decode($res->getBody() ,true);
    }

    /**
     * notice_groups 에 있는 height 값으로 그 블록의 전체 데이터를 불러옴
     * 불러온뒤 이전 해쉬값과 현재 해쉬값을 비교 True -> bind
     * False = return 0
     */
    public function searchByTxHash($txHash) {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', URL, [
            'json' => [
                'jsonrpc' => '2.0',
                'id' => 1234,
                'method' => 'icx_getTransactionResult',
                'params' => [
                    'txHash' => $txHash
                ]
            ]
        ]);
        return json_decode($res->getBody() ,true);
    }

    public function searchByHash($hash) {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', URL, [
            'json' => [
                'jsonrpc' => '2.0',
                'id' => 1234,
                'method' => 'icx_getBlockByHash',
                'params' => [
                    'hash' => $hash
                ]
            ]
        ]);
        return $res->getBody();
    }

    // 현재 노드의 2번째 전 노드까지 비교 
    public function blockEqualsCurrent($hash) {
        $currentData = json_decode(self::searchByHash($hash), true);
        // $prevData = json_decode(self::searchByHash($currentData['result']['prev_block_hash']), true);

        // dd($data);
        // echo $currentData['result']['prev_block_hash'] . ' == ' . $prevData['result']['block_hash'];
        echo $currentData['result']['prev_block_hash'];
    }

    /**
     * db 에 height 값을 searchbyheight 
     * prevHash 값에 가서 blockHash 와 비교
     */


}
