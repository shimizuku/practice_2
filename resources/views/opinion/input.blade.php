@extends('layouts.global')

@section('title', 'Opinion')
@section('content')
<main>
    <div class="container">
        <h1 class="display-4 mt-5 mb-5">Contact</h1>
        <form action="{{ route('opinionConfirm') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <p>
                        お名前（必須）
                        @error('name')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', isset($postData['name']) ? $postData['name'] : '') }}">
                    </p>
                </div>
                <div class="col-md-5">
                    <p>
                        フリガナ（必須）
                        @error('kana')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" name="kana" class="form-control @error('kana') is-invalid @enderror" value="{{ old('kana', isset($postData['kana']) ? $postData['kana'] : '') }}">
                    </p>
                </div>
                <div class="col-md-2">
                    <p>
                        年齢
                        <input type="text" name="age" class="form-control" value="{{ old('age', isset($postData['age']) ? $postData['age'] : '') }}">
                    </p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-5">
                    <p>
                        都道府県 （必須）
                        @error('prefecture')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <select name="prefecture" class="form-select @error('prefecture') is-invalid @enderror">
                            @foreach(App\Consts\Prefectures::PREF_LIST as $num => $name)
                                <option value="{{ $num }}" @if(!empty($postdata['prefecture']) && $postdata['prefecture'] == $num || !empty(old('prefecture')) && old('prefecture') == $num) selected @endif>{{ $name }}</option>
                            @endforeach
                        </select>
                    </p>
                </div>
                <div class="col-md-7">
                    <p>
                        市区町村 （必須）
                        @error('municipalities')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" name="municipalities" class="form-control @error('municipalities') is-invalid @enderror" value="{{ old('municipalities', isset($postData['municipalities']) ? $postData['municipalities'] : '') }}">
                    </p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md">
                    <p>
                        番地（必須）
                        @error('address')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', isset($postData['address']) ? $postData['address'] : '') }}">
                    </p>
                </div>
                <div class="col-md">
                    <p>
                        マンション名等
                        <input type="text" name="building" class="form-control" value="{{ old('building', isset($postData['building']) ? $postData['building'] : '') }}">
                    </p>
                </div>
            </div>
            <p>
                メールアドレス（必須）
                @error('email')
                    <span class="text-danger small" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', isset($postData['email']) ? $postData['email'] : '') }}">
            </p>
            <p>
                確認用メールアドレス（必須）
                @error('check_email')
                    <span class="text-danger small" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text" name="check_email" class="form-control @error('check_email') is-invalid @enderror" value="{{ old('check_email') }}">
            </p>
            <p>
                電話番号
                <input type="text" name="tel" value="{{ old('tel', isset($postData['tel']) ? $postData['tel'] : '') }}" class="form-control">
            </p>
            <p>
                ご意見・ご要望内容（必須）
                @error('opinion')
                    <span class="text-danger small" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <textarea name="opinion" cols="30" rows="10" class="form-control @error('opinion') is-invalid @enderror">{{ old('opinion', isset($postData['opinion']) ? $postData['opinion'] : '') }}</textarea>
            </p>
            <div class="text-center">
                <input type="submit" class="btn btn-info w-50 btn-lg mb-5" value="入力内容確認">
            </div>
        </form>
    </div>
</main>
@endsection
