@extends('layouts.not_logged_in')

@section('content')
<div  class="logget">
    <div>
        <h1>ログイン画面</h1>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div>   
                <lable>
                    メールアドレス:
                    <input type="email" name="email">
                </lable>
            </div>
            <div>   
                <lable>
                    パスワード:
                    <input type="password" name="password">
                </lable>
            </div>
            <div>
                <input type="submit" value="ログイン">
            </div>
        </form>
    </div>
</div>

@endsection