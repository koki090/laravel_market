@extends('layouts.logged_in')

@section('content')

<h1>{{ $title }}</h1>
<div class="logget">
    <div class="profile_edit">
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('patch')
            <div>
                <label>
                    名前:
                    <input type="text" name="name" value="{{ $user->name }}">
                </label>
            </div>
            <div>
                <label>
                    メールアドレス:
                    <input type="email" name="email" value="{{ $user->email }}">
                </label>
            </div>
            <div>
                <label>
                    <textarea name="profile" rows="5" cols="30">{{ $user->profile }}</textarea>
                </label>
            </div>
            <div>
                <input type="submit" value="変更を保存">
            </div>
        </form>        
    </div>
</div>


@endsection