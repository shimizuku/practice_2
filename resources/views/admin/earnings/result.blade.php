@extends('layouts.app')

@section('content')
<h3>売上{{ App\Consts\Type::TYPE[$type] }}完了</h3>
<p><span>{{ App\Consts\Type::TYPE[$type] }}完了しました。</span></p>
@endsection
