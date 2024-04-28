@extends('layouts.app')

@section('content')
<h3>売上{{ App\Consts\Type::TYPE[$type] }}確認</h3>
@php
@endphp
<table class="confirm-table">
    <tr>
        <th>日付</th>
        <td>{{ $data['date'] }}</td>
    </tr>
    <tr>
        <th>来店時刻</th>
        <td>{{ $data['visit_at'] }}</td>
    </tr>
    <tr>
        <th>お客様の名前</th>
        <td>{{ $data['customer_name'] }}</td>
    </tr>
    <tr>
        <th>お客様の性別</th>
        <td>{{ App\Consts\Gender::GENDER[$data['customer_gender']] }}</td>
    </tr>
    <tr>
        <th>お客様の年齢</th>
        <td>{{ $data['customer_age'] }}</td>
    </tr>
    <tr>
        <th>メニュー選択</th>
        <td>
            @foreach ($data['menu_id'] as $v)
                {{ $menus[$v]['name'] }}<br>
            @endforeach
        </td>
    </tr>
</table>
@if ($type == 'create')
<form action="{{ route('resultEarnings', ['type' => $type] )}}" method="post">
@else
<form action="{{ route('resultEarnings', ['type' => $type, 'id' => $data['id']]) }}" method="post">
@endif
@csrf
    <input type="hidden" name="user" value="{{ Auth::user()->id }}">
    <input type="hidden" name="type" value="{{ $type }}">
    <input type="hidden" name="date" value="{{ $data['date'] }}">
    <input type="hidden" name="visit_at" value="{{ $data['visit_at'] }}">
    <input type="hidden" name="customer_name" value="{{ $data['customer_name'] }}">
    <input type="hidden" name="customer_gender" value="{{ $data['customer_gender'] }}">
    <input type="hidden" name="customer_age" value="{{ $data['customer_age'] }}">
    @foreach ($data['menu_id'] as $v)
        <input type="hidden" name="menu_id[]" value="{{ $v }}">
    @endforeach
    <p class="input-button">
        @if ($type == 'create')
        <input formaction="{{ route('returnInputEarnings', ['type' => $type] )}}" type="submit" value="修正">
        @else
        <input formaction="{{ route('returnInputEarnings', ['type' => $type, 'id' => $data['id']])}}" type="submit" value="修正">
        @endif
        <input type="submit" value="{{ App\Consts\Type::TYPE[$type] }}完了">
    </p>
</form>
@endsection
