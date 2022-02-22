@extends('layouts.logged_in')

@section('content')

<h1>{{ $title }}</h1>
<dl class="item_show_buy">
    <div class="item_buy_image">
        <dt>画像</dt>   
        @if($item->image !== '')
        <dd><img src="{{ asset('storage/' . $item->image) }}"></dd>
        @else
        <dd><img src="{{ asset('images/no_image.png') }}"></dd>
        @endif    
    </div>
    <div class="item_buy_infomation">
        <div>
            <dt>商品名</dt>
            <dd>{{ $item->name }}</dd>
            <dt>カテゴリ</dt>
            <dd>{{ $item->category->name }}</dd>
            <dt>価格</dt>
            <dd>{{ $item->price }}円</dd>
            <dt>説明</dt>
            <dd>{{ $item->description }}</dd>     
        </div>
    </div>
</dl>
<div class="item_buy">
    <div>
        @if($orders->contains('item_id', $item->id))
        <p>売り切れ</p>
        @else
        <p>出品中</p>
        
        @if(\Auth::user()->id !== $item->id)
        <a href="{{ route('items.confirm', $item->id) }}">購入する。</a>
        @endif
        
        @endif     
    </div>
</div>

@endsection