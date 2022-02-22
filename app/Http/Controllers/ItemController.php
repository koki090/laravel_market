<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Order;
use App\Like;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ItemImageRequest;
use App\Http\Requests\OrderRequest;
use App\Services\FileUploadService;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::otherItems()->orderBy('created_at', 'desc')->paginate(4);
        $orders = Order::all();
        return view('items.index', [
            'title' => 'CodeCampMarket',
            'items' => $items,
            'orders' => $orders]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', [
            'title' => '商品を出品',
            'categories' => $categories,]);
    }

    public function store(ItemRequest $request,FileUploadService $service)
    {
        $image = $request->file('image');
        $path = $service->saveItemImage($image);
        $user_id = \Auth::user()->id;
        Item::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $path,]);
        
        session()->flash('success', '商品を出品しました。');
        return redirect()->route('users.exhibitions', $user_id);
    }

    public function show($id)
    {
        $item = Item::find($id);
        $orders = Order::all();
        return view('items.show', [
            'title' => '商品詳細',
            'item' => $item,
            'orders' => $orders]);
    }
    
    public function confirm($id){
        $item = Item::find($id);
        return view('items.confirm', [
            'title' => '購入確認画面',
            'item' => $item]);
    }
    
    public function finish(OrderRequest $request, $id){
        Order::create($request->only(['user_id', 'item_id']));
        $item = Item::find($id);
        return view('items.finish', [
            'title' => 'ご購入ありがとうございました。',
            'item' => $item]);
    }
    
    
    public function edit($id)
    {   
        $item = Item::find($id);
        if(\Auth::user()->id === $item->user_id){
            $choice_category_id = $item->category_id;
            $not_choice_categories = Category::all()->where('id', '!=', $choice_category_id);
            return view('items.edit', [
                'title' => '商品情報の編集',
                'item' => $item,
                'choice_category_id' => $choice_category_id,
                'not_choice_categories' => $not_choice_categories]);
        }else{
            return redirect()->route('items.index');
        }
        
    }

    public function update(ItemRequest $request, $id)
    {
        Item::find($id)->update($request->only([
            'name', 'description', 'price', 'category_id',]));
        session()->flash('success', '出品情報を編集しました。');
        return redirect()->route('items.show', $id);
        
    }
    
    public function editImage($id)
    {
        $item = Item::find($id);
        if(\Auth::user()->id === $item->user_id){
            return view('items.edit_image', [
                'title' => '商品画像の編集',
                'item' => $item]);
        }else{
            return redirect()->route('items.index');
        }
        
    }

    public function updateImage(ItemImageRequest $request, FileUploadService $service, $id)
    {
        $image = $request->file('image');
        $path = $service->saveItemImage($image);
        
        $item = Item::find($id);
        if($item->image !== ''){
            \Storage::disk('public')->delete('items/' . $item->image);
        }
        $item->update([
            'image' => $path,]);
        session()->flash('success', '商品画像の変更しました。');
        return redirect()->route('items.show', $id);
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        if($item->image !== ''){
            \Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        session()->flash('success', '出品商品を削除しました。');
        return redirect()->route('users.exhibitions', \Auth::user()->id);
    }
    
    public function like($id, Request $request){
        $user = \Auth::user();
        $item = Item::find($id);
        if($item->isLikedBy($user->id)){
            $item->likes->where('user_id', $user->id)->first()->delete();
            session()->flash('success', 'お気に入り登録を取り消しました。');
        }else{
            Like::create([
                'user_id' => $user->id,
                'item_id' => $item->id,]);
            session()->flash('success', 'お気に入り登録しました。');
        }
        if($request->root === 'items'){
            return redirect()->route('items.index');
        }elseif($request->root === 'users'){
            return redirect()->route('users.show', $user->id);
        }else{
            return redirect()->route('likes.index');
        }
    }
    
    public function __construct(){
        $this->middleware('auth');
    }
}
