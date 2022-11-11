@extends('layouts.app')

@section('title')
Index
@endsection

@section('content')
    <div>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button> Logout </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif
    </div>
@endsection



