@extends('layouts.default')

@section('title', $title)

@section('header')

<header class="header container">
    <ul class="header_nav">
        <li>
            <a href="{{ route('items.index') }}"><img src="">Market</a>
        </li>
        <li>
            {{ \Auth::user()->name }}さん<br>こんにちは！
        </li>
        <li>
            <a href="{{ route('users.show', \Auth::user()) }}">プロフィール</a>
        </li>
        <li>
            <a href="{{ route('likes.index') }}">お気に入り一覧</a>
        </li>
        <li>
            <a href="{{ route('users.exhibitions', \Auth::user()->id) }}">出品商品一覧</a>
        </li>
        <li>
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <input type="submit" value="ログアウト">
            </form>
        </li>
    </ul>
</header>

@endsection