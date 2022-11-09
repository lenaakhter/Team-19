@extends('layouts.main')

@section('pageInfo')

<div class="content">
    <div class="title">
        <h1>Your basket, {{Session::get('user')['name']}}</h1>
    </div>
</div>

@endsection