@extends('layouts.master') @section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <label for="name">Name: </label>
    <input id="name" type="text" name="name" autofocus>

    <br>

    <label for="email">Email: </label>
    <input id="email" type="email" name="email">

    <br>

    <label for="password">Password: </label>
    <input id="password" type="password" name="password">

    <br>

    <label for="password_confirmation">Password Confirmation:</label>
    <input type="password" id="password_confirmation" name="password_confirmation">

    <br>

    <button type="submit">Register</button>

    @include('layouts.errors')
</form>

@endsection
