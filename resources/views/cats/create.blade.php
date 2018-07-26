@extends('layouts.master') @section('content')

<h1>New Cat</h1>

@if (!empty($cat))
<form method="POST" action="/cats/{{ $cat->id }}">
    @else
    <form method="POST" action="/cats">
        @endif @csrf @if (!empty($cat)) @method('PATCH') @endif

        <label for="name">Name: </label>
        <input type="text" name="name" value="{{ $cat->name or '' }}">

        <label for="description">Description:</label>
        <input type="text" name="description" value="{{ $cat->description or '' }}">

        <input type="submit" value="{{ !empty($cat) ? 'Save Cat' : 'Create Cat' }}">
    </form>

    @endsection
