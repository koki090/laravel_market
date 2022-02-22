@extends('layouts.logged_in')

@section('content')

<h1>{{ $title }}</h1>
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
                </li>
                @if($orders->contains('item_id', $item->id))
                <li>売り切れ</li>
                @else
                <li>出品中</li>
                @endif
                <li>
                    <a href="{{ route('items.edit', $item->id) }}">[編集]</a>
                    <a href="{{ route('items.edit_image', $item->id) }}">[画像を変更]</a>
                </li>
                <li>
                    <form method="post" action="{{ route('items.destroy', $item->id) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="削除">
                    </form>
                </li>
            </div>
            <div>
                <li>{{ $item->price }}円</li>
                <li>カテゴリ:{{ $item->category->name }}</li>
                <li>{{ $item->created_at }}]</li>
            </div>
        </ul>
    </div>
@empty
<p>お気に入りの商品はありません。</p>
@endforelse
</div>
{{ $items->links() }}

@endsection