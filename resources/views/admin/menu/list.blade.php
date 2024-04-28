@extends('layouts.app')

@section('content')
<h3>メニュー一覧</h3>
<table class="list">
    <tr>
        <th>@sortablelink('id', 'ID')</th>
        <th><p>メニュー名</p></th>
        <th>@sortablelink('menu_category_id', 'メニュー名')</th>
        <th><p>表示順</p></th>
        <th><p>作成日時</p></th>
        <th>@sortablelink('update_at', '更新日時')</th>
        <th><a class="btn btn-info " href="{{ route('createInputMenu') }}">{{ __('新規作成') }}</a></th>
    </tr>
    @foreach ($menus as $key)
        <tr>
            <td>{{ $key->id }}</td>
            <td>{{ $key->name }}</td>
            <td>{{ $key->category }}</td>
            <td>{{ $key->turn }}</td>
            <td>{{ $key->created_at }}</td>
            <td>{{ $key->updated_at }}</td>
            <td>
                <form action="" method="post">
                    <a class="btn btn-primary" href="{{ route('editInputMenu', ['id' => $key->id]) }}">{{ __('編集') }}</a>
                    <button class="btn btn-secondary" type="submit" onclick="return confirm('本当に削除しますか？')" name="delete" value="{{ $key->id }}">
                        削除
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
