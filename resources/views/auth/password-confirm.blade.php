@extends('layouts.app')


@section('title')
    Password confirmation
@endsection

@section('content')
    @if(session('status'))
        <p> {{ session('status') }}</p>
    @endif
    <p> The last action require to confirm your password </p>
    <form action="{{ route('password.confirm') }}" method="POST">
        @csrf
        <input type="password" name="password" placeholder="password">

        @error('password')
        <p>{{ $message }}</p>
        @enderror

        <button> Confirm password</button>
    </form>
@endsection
