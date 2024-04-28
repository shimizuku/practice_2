@extends('layouts.global')

@section('title', 'Opinion')
@section('content')
<main>
    <div class="container">
        <h1 class="display-4 mt-5 mb-5">Contact</h1>
            <div class="container mt-5 mb-5">
                <p class="lead lh-lg">ご意見ご要望を承りました。</p>
            </div>
        <div class="text-center">
            <a href="{{ route('top')}}" class="btn btn-secondary btn-lg w-50 mb-5">トップページに戻る</a>
        </div>
    </div>
</main>
@endsection
