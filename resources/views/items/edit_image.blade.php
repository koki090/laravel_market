@extends('layouts.logged_in')

@section('content')

<h1>{{ $title }}</h1>
<div class="item_edit">
    <div class="image">
        <p>現在の商品写真</p>
        @if($item->image !== '')
        <img src="{{ asset('storage/' . $item->image) }}">
        @else
        <img src="{{ asset('images/no_image.png') }}">
        @endif    
    </div>
    <div class="edit_menu">
        <form method="post" action="{{ route('items.update_image', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div>
                <label>
                    <input type="file" name="image">
                </label>
            </div>
            <div>
                <input type="submit" value="画像の変更を保存">
            </div>
        </form>    
    </div>
</div>

@endsection