@extends('layouts.master') @section('content')

<h1>All Cats</h1>

<h2>
    <a href="/cats/new">Add new cat</a>
</h2>

<hr>

<div class="cats">
    @foreach ($cats as $cat) @include('cats.cat') @endforeach
</div>
@endsection
