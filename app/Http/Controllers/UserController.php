<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use App\Order;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserImageRequest;

class UserController extends Controller
{   
    private function saveUserImage($image){
        $path = '';
        if(isset($image) === true){
            $path = $image->store('users', 'public');
        }
        return $path;
    }
    
    public function show($id){
        $user = User::find($id);
        $items = $user->orderItems()->paginate(4);
        $exhibited_item_count = Item::where('user_id', '=', $id)->count();
        return view('users.show', [
            'title' => $user->name . 'さんのプロフィール',
            'user' => $user,
            'items' => $items,
            'exhibited_item_count' => $exhibited_item_count,]);
        
    }
    
    public function edit($id){
        $user = User::find($id);
        if(\Auth::user()->id === $user->id){
            return view('users.edit', [
                'title' => 'プロフィールの編集',
                'user' => $user,]);
        }else{
            return redirect()->route('users.show', $id);
        }
        
    }
    
    public function update(UserRequest $request, $id){
        User::find($id)->update($request->only([
            'name', 'email', 'profile',]));
        session()->flash('success', 'プロフィールの編集しました。');
        return redirect()->route('users.show', $id);
        
    }
    
    public function editImage($id){
        $user = User::find($id);
        if(\Auth::user()->id === $user->id){
            return view('users.edit_image', [
                'title' => 'プロフィール画像の変更',
                'user' => $user,]);
        }else{
            return redirect()->route('users.show', $id);
        }
        
        
    }
    
    public function updateImage(UserImageRequest $request, $id){
        $image = $request->file('image');
        $path = $this->saveUserImage($image);
        
        $user = User::find($id);
        if($user->image !== ''){
            \Storage::disk('public')->delete('users/' . $user->image);
        }
        $user->update([
            'image' => $path,]);
        session()->flash('success', 'プロフィール画像を変更しました。');
        return redirect()->route('users.show', $id);
        
    }
    
    public function exhibitions($id){
        $user = User::find($id);
        $items = $user->items()->orderBy('created_at','desc')->paginate(4);
        $orders = Order::all();
        return view('users.exhibitions', [
            'title' => $user->name . 'さん出品商品一覧',
            'items' => $items,
            'orders' => $orders]);
    }
    
    public function __construct(){
        $this->middleware('auth');
    }
}
