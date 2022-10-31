@extends('layouts.main')

@section('pageInfo')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
<div>
    
<div class="header">
    <a href="/" class="logo">Sarth</a>
    <div class="header-right">
        <a class="active" href="/">Home</a>
        <a href="/products">Products</a>
        <a href="/contact">Contact</a>
    </div>
</div> 

<div class="content">
    <div class="title">
        <h1>About us, what we sell</h1>
    </div>
</div>

@endsection

