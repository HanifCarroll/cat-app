@extends('layouts.master') @section('content')
<h1>Login</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <label for="email">Email: </label>
    <input id="email" type="email" name="email">

    <br>

    <label for="password">Password: </label>
    <input id="password" type="password" name="password">

    <br>

    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
    <label class="form-check-label" for="remember">
        Remember Me
    </label>

    <button type="submit">Log in</button>
    <a href="{{ route('password.request') }}">
        Forgot Your Password?
    </a>

    @include('layouts.errors')
</form>

@endsection
