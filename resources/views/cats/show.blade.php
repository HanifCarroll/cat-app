@extends('layouts.master') @section('content')

<div class="cat">
    <a href="/cats">Return to cats</a>
    <h1 class="cat-name">
        {{ $cat->name }}
    </h1>

    <p class="cat-description">{{ $cat->description }}</p>

    @if (Auth::id() === $cat->user_id)
    <p>
        <a href="/cats/{{ $cat->id }}/edit">Edit</a>
    </p>

    <form method="POST" action="/cats/{{ $cat->id }}">
        @csrf @method('DELETE')
        <input type="submit" value="Delete">
    </form>
    @endif

    <hr>

    <div class="comments">
        @foreach ($cat->comments as $comment)
        <p>{{ $comment->body }}</p>
        @endforeach
    </div>

    <div class="add-comment">
        <form method="POST" action="/cats/{{ $cat->id }}/comments">
            @csrf

            <textarea name="body" id="body" cols="30" rows="5"></textarea>

            <input type="submit" value="Add comment"> @include('layouts.errors')
        </form>
    </div>
</div>
@endsection
