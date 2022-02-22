@extends('layouts.logged_in')

@section('content')

<h1>{{ $title }}</h1>
<div class="logget">
    <div>
        <h2>商品編集フォーム</h2>
        <form method="post" action="{{ route('items.update', $item->id) }}">
            @csrf
            @method('patch')
            <div>
                <label>
                    商品名:
                    <input type="text" name="name" value="{{ $item->name }}">
                </label>
            </div>
            <div>
                <label>
                    商品説明:<br>
                    <textarea name="description" rows="5" cols="45">{{ $item->description }}</textarea>
                </label>
            </div>
            <div>
                価格:
                <input type="number" name="price" value="{{ $item->price }}">
            </div>
            <div>
                カテゴリー:
                <select name="category_id">
                    <option value="{{ $choice_category_id }}">{{ $item->category->name }}</option>
                    @foreach($not_choice_categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="submit" value="編集を保存">
            </div>
        </form>        
    </div>
    
</div>


@endsection