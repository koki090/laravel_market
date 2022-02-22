<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use App\Order;

class LikeController extends Controller
{
    public function index(){
        $id = \Auth::user()->id;
        $items = User::find($id)->likeItems()->orderBy('likes.created_at','desc')->paginate(4);
        $orders = Order::all();
        return view('likes.index', [
            'title' => 'お気に入り一覧',
            'items' => $items,
            'orders' => $orders]);
    }
    
    public function __construct(){
        $this->middleware('auth');
    }
}
