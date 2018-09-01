<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Bill;
use App\Electric;
use App\Gas;
use App\Notice;
use App\Group;

use DB;
use Auth;

const ZERO = 0;
class MergeController extends Controller
{
    protected $blockMainController;
    public function __construct(BlockController $blockMainController) {
        $this->blockMainController = $blockMainController;
    }
    // 사용자의 모든 우편
    public function boxAll() {
        /**
         * Group 에 등록되어있는 모든 행을 가져와, BlockController Hash 와 비교
         * 틀린건 error, 합격은 출력
         */

        $alls = Group::where('email', Auth::User()->email)->get();

        
        foreach($alls as $all) {
        $allJoinLists = Group::join($all->category . 's', $all->category . 's.id', '=', 'n_groups.n_id')
            ->select('n_groups.*', $all->category . 's'. '.*')
            ->where('n_groups.email', Auth::User()->email)
            ->orderBy($all->category . 's.id', 'desc')
            ->get();
        }
            
            
        return view('boxs', compact('allJoinLists'));
    }

    public function boxDetail($id, $category) {
        $detail = Group::join($category . 's', $category . 's.id', '=', 'n_groups.n_id')
        ->select('n_groups.*', $category . 's'. '.*')
        ->where('n_groups.email', Auth::User()->email)
        ->where($category .'s.id', $id)
        ->first();

        // dd($detail);
        $customer = User::where('email', $detail->email)->first();
        return view('pages.' . $category, compact('detail', 'customer'));
    }


}
