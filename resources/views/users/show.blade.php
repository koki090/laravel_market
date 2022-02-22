@extends('layouts.logged_in')

@section('content')

<h1>{{ $title }}</h1>
<div class="profile">
    <div class="image">
        @if($user->image !== '')
        <img src="{{ asset('storage/' . $user->image) }}"><br>
        @else
        <img src="{{ asset('images/no_user_image.png') }}"><br>
        @endif
        @if($user->id === \Auth::user()->id)
        <a href="{{ route('users.edit_image', $user->id) }}">画像を変更</a>
        @endif    
    </div>
    <div>
        <dl>
            <dt>名前</dt>
            <dd>{{ $user->name }}</dd>
            <dt>メールアドレス</dt>
            <dd>{{ $user->email }}</dd>
            <dt>プロフィール</dt>
            @if($user->profile !== '')
            <dd>{{ $user->profile }}</dd>
            @else
            <dd>プロフィールを入力してみましょう。</dd>
            @endif
        </dl>
        @if($user->id === \Auth::user()->id)
        <a href="{{ route('users.edit', $user->id) }}">編集</a>
        @endif
        <div>
            出品数:{{ $exhibited_item_count }}品
            @if($user->id === \Auth::user()->id)
            <a href="{{ route('items.create') }}">新規出品</a>
            @endif
        </div>        
    </div>
    
</div>

@if($user->id === \Auth::user()->id)
<h2>購入履歴</h2>
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
                    <input type="hidden" name="root" value="users">
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

@else
<a href="{{ route('users.exhibitions', $user->id) }}">{{ $user->name }}さんの出品商品一覧</a>
@endif


@endsection
