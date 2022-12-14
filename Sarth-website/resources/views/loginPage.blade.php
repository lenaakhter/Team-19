<div class="bg-image">
    @extends('layouts.main')
    @section('pageInfo')

    @if(session()->has('BasketLoginMsg'))
    <div class="alert alert-info" role="alert">
        You need to Login to add to Basket
    </div>
    @endif
    <br>
    <br>

    <!-- Login Form-->

    <div class="login" id="login-page">
        <div class="form-box">
            <div class="buttons-accounts">
                <div id="btn"></div>
                <button type="button" onclick=window.location.href="/login" class="toggle-btn" id="select"> Log In
                </button>
                <button type="button" onclick=window.location.href="/userRegistration" class="toggle-btn"
                    id="non-select">Sign Up</button>
            </div>

            <div class="error-message">
                @if (session('status'))
                {{session('status')}}
                @endif
            </div>
            <form action="/login" method="post" class="login-inputs">
                @csrf
                <input type="email" name="email" placeholder="Your email" class="input-field" /><br>
                <div class="errorlog">
                    @error('email')
                    {{ $message }}
                    <br>
                    @enderror
                </div>
                <input type="password" name="password" placeholder="Password" class="input-field" /><br>
                <div class="errorlog">
                    @error('password')
                    {{ $message }}
                    <br>
                    @enderror
                </div>

                <br>
                <input type="submit" value="Sign in" class="submit-btn">
            </form>
        </div>
        <br>
        <br>

    </div>
</div>
@endsection