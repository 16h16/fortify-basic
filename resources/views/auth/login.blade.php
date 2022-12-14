
@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div>
            <input type="email" name="email" placeholder="email">
            @error('email')
            <p> {{$message}}</p>
            @enderror
        </div>

        <div>
            <input type="password" name="password" placeholder="password">
            @error('password')
            <p> {{$message}}</p>
            @enderror
        </div>

        <div>
            <button> Login </button>
        </div>
    </form>

   <p><a href="{{route('password.request')}}"> Reset password </a></p>
@endsection
