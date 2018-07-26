@extends('layouts.master') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif You are logged in, {{ Auth::user()->name }}
                    <p>Go to
                        <a href="/cats">Cats</a>
                    </p>

                    <a class="nav-link text-success btn btn-outline-success" href="{{ route('logout') }}" onclick="event.preventDefault();                                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
