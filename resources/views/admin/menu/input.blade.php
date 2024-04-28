@extends('layouts.app')

@section('content')
@if (!isset($data['id']))
    <h3>メニュー作成</h3>
@else
    <h3>メニュー編集</h3>
@endif
<table class="tables">
    <div class="input">
    @if (!isset($data['id']))
        <form method="POST" action="{{ route('createConfirmMenu') }}">
    @else
        <form method="POST" action="{{ route('editConfirmMenu', ['id' => $data['id']]) }}">
            <tr>
                <th>ID</th>
                <td>{{ $data->id }}</td>
            </tr>
    @endif
    @csrf
            <tr>
                <th>メニュー名</th>
                <td><input type="text" name="name" value="<?=(!empty($_POST['name']) ? $_POST['name'] : '')?>"></td>
            </tr>
            <tr>
                <th>カテゴリ名</th>
                <td>
                    <select name="category_id">
                        <?php foreach ($categories as $key) :?>
                            <option value="<?=$key['id']?>"<?=(!empty($_POST['category_id']) && $_POST['category_id'] == $key['id'] ? ' selected' : '')?>><?=$key['name']?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>表示順</th>
                <td><input type="text" name="turn" value="<?=(!empty($_POST['turn']) ? $_POST['turn'] : '')?>"></td>
            </tr>
            <tr>
                <th>金額</th>
                <td><input type="text" name="price" value="<?=(!empty($_POST['price']) ? $_POST['price'] : '')?>"></td>
            </tr>
        </div>
    </table>
    <p class="input-button"><input type="submit" value="確認画面へ"></p>
</form>
@endsection
