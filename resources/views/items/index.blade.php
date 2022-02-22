@extends('layouts.logged_in')

@section('content')

<h1>息をするように、買おう</h1>
<a href="{{ route('items.create') }}">新規出品</a>
<div class="item_show">
@forelse($items as $item)
    <div class="item">
        <figure class="item_infomation">
            <div class="image">
                <a href="{{ route('items.show', $item->id) }}">
                    @if($item->image !== '')
                    <img src="{{ asset('storage/' . $item->image) }}">
                    @else
                    <img src="{{ asset('images/no_image.png') }}">
                    @endif
                </a>
            </div>
            <figcaption class="item_description">
                <p>商品説明</p>
                {{ $item->description }}
            </figcaption>
        </figure>
        <ul class="item_content">
            <div>
                <li>
                    商品名:{{ $item->name }}
                    <a class="like_button">{{ $item->isLikedBy(Auth::user()->id) ? '★' : '☆' }}</a>
                    <form method="post" action="{{ route('items.like', $item->id) }}">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="root" value="items">
                    </form>
                </li>
                @if($orders->contains('item_id', $item->id))
                <li>売り切れ</li>
                @else
                <li>出品中</li>
                <li><a href="{{ route('items.confirm', $item->id) }}">購入する。</a></li>
                @endif
            </div>
            <div>
                <li>{{ $item->price }}円</li>
                <li>カテゴリ:{{ $item->category->name }}</li>
                <li>{{ $item->created_at }}]</li>
            </div>
        </ul>
    </div>
@empty
<p>出品商品はまだありません。</p>
@endforelse
</div>
{{ $items->links() }}

@endsection
