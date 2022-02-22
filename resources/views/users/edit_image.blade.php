@extends('layouts.logged_in')

@section('content')

<h1>{{ $title }}</h1>
<div class="profile">
    <div class="image">
        <p>現在の画像</p>
        @if($user->image !== '')
        <img src="{{ asset('storage/' . $user->image) }}">
        @else
        <img src="{{ asset('images/no_user_image.png') }}">
        @endif    
    </div>
    <div class="edit_menu">
        <form method="post" action="{{ route('users.update_image', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div>
                <label>
                    <input type="file" name="image">
                </label>
            </div>
            <div>
                <input type="submit" value="画像を変更">
            </div>
        </form>    
    </div>    
</div>


@endsection