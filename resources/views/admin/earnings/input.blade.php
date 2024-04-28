@extends('layouts.app')

@section('content')
<h3>売上{{ App\Consts\Type::TYPE[$type] }}</h3>
@if ($type == 'create')
<form action="{{ route('confirmEarnings', ['type' => $type]) }}" method="post">
@else
<form action="{{ route('confirmEarnings', ['type' => $type, 'id' => $data->id]) }}" method="post">
<input type="hidden" name="id" value="{{ $data['id']}}">
@endif
    @csrf
    <table>
        <tr>
            <th>日付</th>
            <td>
                <input type="date" name="date" value="@if(!empty($data->date)) {{ $data->date }} @elseif(!empty(old('date'))) {{ old('date') }} @endif">
                @error('date')
                    <span class="error" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>来店時刻</th>
            <td>
                <input type="time" name="visit_at" value="@if(!empty($data->visit_at)) {{ $data->visit_at }} @elseif(!empty(old('visit_at'))) {{ old('visit_at') }} @endif">
                @error('visit_at')
                    <span class="error" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>お客様の名前</th>
            <td>
                <input type="text" name="customer_name" value="@if(!empty($data->customer_name)) {{ $data->customer_name }} @elseif(!empty(old('customer_name'))) {{ old('customer_name') }} @endif">
                @error('customer_name')
                    <span class="error" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>お客様の性別</th>
            <td>
                <select name="customer_gender">
                    @foreach(App\Consts\Gender::GENDER as $k => $v)
                        <option value="{{ $k }}"@if(!empty($data->customer_gender) && $data->customer_gender == $k || !empty(old('customer_gender')) && old('customer_gender') == $k) selected @endif>{{ $v }}</option>
                    @endforeach
                </select>
                @error('customer_gender')
                    <span class="error" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>お客様の年齢</th>
            <td>
                <input type="text" name="customer_age" value="@if(!empty($data->customer_age)) {{ $data->customer_age }} @elseif(!empty(old('customer_age'))) {{ old('customer_age') }} @endif">
                @error('customer_age')
                    <span class="error" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </td>
        </tr>
        <tr>
            <th colspan="2">
                メニュー選択
                @error('date')
                    <span class="error" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </th>
        </tr>
        @foreach($categories as $v)
            <tr>
                <th>{{ $v->name }}</th>
                <td>
                    @foreach($menus[$v->id] as $k2 => $v2)
                        <input type="checkbox" name="menu_id[]" id="menu_{{ $k2 }}" value="{{ $k2 }}"
                        @if (!empty($data['menu_id']) || !empty(old('menu_id')))
                            @if (in_array($v2['name'], $menu_data) || in_array($v2['name'], old('menu_id'))
                                checked
                            @endif
                        @endif
                        >
                        <label for="menu_{{ $k2 }}">
                            {{ $v2['name'] }}
                        </label>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
    <p class="input-button">
        <input type="submit" value="確認画面へ">
    </p>
</form>
@endsection
