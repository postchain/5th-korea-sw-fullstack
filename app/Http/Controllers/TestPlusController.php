<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Bill;
use App\Electric;
use App\Gas;
use App\Group;
use App\Notice;


class TestPlusController extends Controller
{

    protected $blockMainController;
    public function __construct(BlockController $blockMainController) {
        $this->blockMainController = $blockMainController;
    }

    public function index() {
        return view('add');
    }

    public function store(Request $request) {
        $category = $request->input('category');

        switch($category) {
            case 'electric': {
                // 'title', 'a_date', 'n_date', 'customer_email', 'address', 'place_violation', 'date_violation', 'content_violation'
                $electricArray = $request->all();
                $firstNodeCheck = Electric::where('customer_email', $request->input('customer_email'))->orderBy('created_at', 'desc')->first();
                echo '0';
                $createBlock = $this->blockMainController->store($request->input('category'), $request->input('customer_email'));
                // dd($createBlock['result']);
                echo '1';
                echo '10s wait';
                sleep(10);
                $searchTxHashBlock = $this->blockMainController->searchByTxHash($createBlock['result']);
                echo '2';
                // dd($searchTxHashBlock);

                Group::create([
                    'n_id' => empty($firstNodeCheck) ? 1 : $firstNodeCheck->id + 1,
                    'category' => $request->input('category'),
                    'email' => $request->input('customer_email'),
                    'block_hash' => $searchTxHashBlock['result']['blockHash'],
                    'tx_hash' => $createBlock['result']
                ]);
                echo '3';
                Electric::create($electricArray);

                return 'ok';
            }
        }
    }
}
