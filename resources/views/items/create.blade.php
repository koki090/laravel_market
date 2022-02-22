@extends('layouts.logged_in')

@section('content')

<h1>{{ $title }}</h1>
<div class="logget">
    <div>
        <h2>商品追加フォーム</h2>
        <form method="post" action="{{ route('items.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label>
                    商品名:
                    <input type="text" name="name">
                </label>
            </div>
            <div>
                <label>
                    商品説明:<br>
                    <textarea name="description" rows="5" cols="45"></textarea>
                </label>
            </div>
            <div>
                価格:
                <input type="number" name="price">
            </div>
            <div>
                カテゴリー:
                <select name="category_id">
                    <option>カテゴリーを選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>
                    画像を選択:
                    <input type="file" name="image">
                </label>
            </div>
            <div>
                <input type="submit" value="出品">
            </div>
        </form>       
    </div>
     
</div>


@endsection