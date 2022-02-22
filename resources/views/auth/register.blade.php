@extends('layouts.not_logged_in')

@section('content')
<div  class="logget">
    <div>
        <h1>ユーザー登録</h1>
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div>   
                <lable>
                    名前:
                    <input type="text" name="name">
                </lable>
            </div>
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
                <lable>
                    パスワード(確認):
                    <input type="password" name="password_confirmation">
                </lable>
            </div>
            <div>
                <input type="submit" value="登録">
            </div>
        </form>
    </div>
</div>


@endsection