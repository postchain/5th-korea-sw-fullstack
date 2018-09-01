<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Auth;
use DB;

use App\Group;


const ZERO = 0;
class RouteController extends Controller
{
    protected $blockMainController;
    public function __construct(BlockController $blockMainController) {
        $this->blockMainController = $blockMainController;
    }

    public function index() {
        $dt = Carbon::now()->toDateString();

        if(Auth::User()) {
            $allPosts = Group::where('email', Auth::User()->email)->count();
            $unPaid = Group::where('email', Auth::User()->email)->where('result', 0)->get(); // 미납부 카운트
            $unPaidCount = $unPaid->count();
            $unPaidAllMoney = ZERO;
            $__blocks = [];
            foreach($unPaid as $key=>$getUnPaid) {
                if($getUnPaid['result'] == ZERO) {
                    $_blocks = json_decode($this->blockMainController->searchByHash($getUnPaid['block_hash']), true);
                    if(substr($getUnPaid->block_hash, 2) != $_blocks['result']['block_hash'])
                        return 0;
                    $categoryDbSelect = DB::table($getUnPaid->category . 's')->where('customer_email', Auth::User()->email)->get();
                    foreach($categoryDbSelect as $money) {
                        $unPaidAllMoney += $money->price;
                        break;
                    }

                }
            }
            return view('index', compact('dt', 'allPosts', 'unPaidCount', 'unPaidAllMoney'));
        } else {
            return view('index', compact('dt'));
        }
        
    }

    public function getHashEquals($hash, $prevHash) {

    }

    public function payment() {
        return view('payment');
    }

    public function account() {
        return view('account');
    }

    public function successSignup() {
        return view('success.signup');
    }

    public function successPayment() {
        return view('success.payment');
    }
}
