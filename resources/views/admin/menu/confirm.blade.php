@extends('layouts.app')

@section('content')
<h3>メニュー{{ $type }}確認</h3>
<table class="tables">
@if (!isset($data['id']))
    <form action="{{ route('createResultMenu') }}" method="POST">
    @csrf
@else
    <form action="{{ route('editResultMenu', ['id' => $data['id']]) }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $data['id'] }}">
@endif
    <tr>
        <th>メニュー名</th>
        <td>{{ $data->name }}</td>
    </tr>
    <tr>
        <th>カテゴリ名</th>
        <td>{{ $categories[$data->kinds] }}</td>
    </tr>
    <tr>
        <th>表示順</th>
        <td>{{ $data->turn }}</td>
    </tr>
    <tr>
        <th>金額</th>
        <td>{{ $data->price }}</td>
    </tr>
</table>
<input type="hidden" name="name" value="{{ $data->name }}">
<input type="hidden" name="category_id" value="{{ $data->category_id }}">
<input type="hidden" name="turn" value="{{ $data->turn }}">
<input type="hidden" name="price" value="{{ $data->price }}">
<p class="input-button">
    <button type="submit" class="btn btn-primary">
        送信
    </button>
    @if (!isset($postData['id']))
    <button formaction="{{ route('createPostInputMenu') }}" type="return" class="btn btn-secondary" name="return" value="return">
        戻る
    </button>
    @else
    <button formaction="{{ route('editPostInputMenu', ['id' => $postData['id']]) }}" type="return" class="btn btn-secondary" name="return" value="return">
        戻る
    </button>
    @endif
</p>
</form>
@endsection
