@extends('layouts.app')

@section('content')
<h3>売上一覧</h3>
<div class="flex-box">
    <div class="flex-item">
        <form action="{{ route('anotherDayEarningsList')}}" method="POST">
            @csrf
            <p>
                <label for="date">日付：</label>
                <input type="date" name="date" value="{{ $date }}">
                <input type="submit" value="表示">
            </p>
        </form>
    </div>
    <div class="flex-item">
        <table>
            <tr>
                <td>合計売上金額</td>
                <td>{{ $total }}円</td>
            </tr>
        </table>
    </div>
</div>
<table class="list">
    <tr>
        <th>お客様名</th>
        <th>メニュー</th>
        <th>売上総額</th>
        <th>
            <button class="button btn-primary">
                <a href="{{ route('inputEarnings', ['type' => 'create']) }}">新規登録</a>
            </button>
        </th>
    </tr>
    @foreach ($earnings as $v)
        <tr>
            <td>{{ $v->customer_name }}</td>
            <td>{!! nl2br(str_replace(',', '<br>', $v->menu_name)) !!}</td>
            <td>{{ $v->sum_price }}</td>
            <td>
                <div class="list-button">
                    <form action="" method="post">
                        @csrf
                        <button class="button btn-primary">
                            <a href="{{ route('inputEarnings', ['type' => 'edit', 'id' => $v->id]) }}">編集</a>
                        </button>
                        <button class="button btn-secondary" type="submit" onclick="return confirm('本当に削除しますか？')" name="delete" value="{{ $v->id }}">
                            削除
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</table>
<div class="dl">
    <form action="" method="post">
        @csrf
        <button name="dl_csv" onclick="proc1();" type="submit">CSVダウンロード</button>
    </form>
</div>
@endsection
