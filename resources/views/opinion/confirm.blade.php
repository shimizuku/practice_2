@extends('layouts.global')

@section('title', 'Opinion')
@section('content')
<main>
    <div class="container">
        <h1 class="display-4 mt-5 mb-5">Contact</h1>
        <div class="row">
            <div class="col-md-5 mb-3">
                お名前
                <div class="bg-light p-2 border border-bg-dark rounded">
                    {{ $postData['name'] }}
                </div>
            </div>
            <div class="col-md-5 mb-3">
                フリガナ
                <div class="bg-light p-2 border border-bg-dark rounded">
                    {{ $postData['kana'] }}
                </div>
            </div>
            <div class="col-md-2 mb-3">
                年齢
                <div class="bg-light p-2 border border-bg-dark rounded">
                    {{ $postData['age'] }}
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-5 mb-3">
                都道府県
                <div class="bg-light p-2 border border-bg-dark rounded">
                    {{ App\Consts\Prefectures::PREF_LIST[$postData['prefecture']] }}
                </div>
            </div>
            <div class="col-md-7 mb-3">
                市区町村
                <div class="bg-light p-2 border border-bg-dark rounded">
                    {{ $postData['municipalities'] }}
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md mb-3">
                番地
                <div class="bg-light p-2 border border-bg-dark rounded">
                    {{ $postData['address'] }}
                </div>
            </div>
            <div class="col-md mb-3">
                マンション名等
                <div class="bg-light p-2 border border-bg-dark rounded">
                    {{ $postData['building'] }}
                </div>
            </div>
        </div>
        <div class="mb-3">
            メールアドレス
            <div class="bg-light p-2 border border-bg-dark rounded">
                {{ $postData['email'] }}
            </div>
        </div>
        <div class="mb-3">
            電話番号
            <div class="bg-light p-2 border border-bg-dark rounded">
                {{ $postData['tel'] }}
            </div>
        </div>
        <div class="mb-3">
            ご意見・ご要望内容
            <div class="bg-light p-2 border border-bg-dark rounded">
                {!! nl2br(e($postData['opinion'])) !!}
            </div>
        </div>
        <form action="{{ route('opinionResult')}}" method="post">
            @csrf
            <input type="hidden" name="name" value="{{ $postData['name'] }}">
            <input type="hidden" name="kana" value="{{ $postData['kana'] }}">
            <input type="hidden" name="age" value="{{ $postData['age'] }}">
            <input type="hidden" name="prefecture" value="{{ $postData['prefecture'] }}">
            <input type="hidden" name="municipalities" value="{{ $postData['municipalities'] }}">
            <input type="hidden" name="address" value="{{ $postData['address'] }}">
            <input type="hidden" name="building" value="{{ $postData['building'] }}">
            <input type="hidden" name="email" value="{{ $postData['email'] }}">
            <input type="hidden" name="check_email" value="{{ $postData['check_email'] }}">
            <input type="hidden" name="tel" value="{{ $postData['tel'] }}">
            <input type="hidden" name="opinion" value="{{ $postData['opinion'] }}">
            <div class="row justify-content-center gap-2 mt-3 mb-5">
                <div class="col">
                    <input formaction="{{ route('opinionPostInput')}}" type="submit" class="btn btn-secondary w-100 btn-lg text-center" value="修正">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-info w-100 btn-lg text-center" value="完了">
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
