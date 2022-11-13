@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    @if(session('status'))
        <p> {{ session('status') }}</p>
    @endif

     <h1> Welcome home</h1>

     @if(session('status'))
         <p>{{session('status')}}</p>
     @endif

    <div>
        @if(!auth()->user()->two_factor_secret)
            <p> You have not enabled two factor authentification </p>
            <form action="{{ route('two-factor.enable') }}" method="POST">
                 @csrf
                 <button> Enable 2FA </button>
            </form>
        @else
            <p> You have enabled 2FA ! Please scan the following QR Code into your phone authenticator application </p>
            {!! auth()->user()->twoFactorQrCodeSvg() !!}

            <p> Please store this recovery codes in a secure location </p>
            @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $recoveryCode)
                <p> {{ $recoveryCode }} </p>
            @endforeach

            <form action="{{ route('two-factor.disable') }}" method="POST">
                 @csrf
                 @method('DELETE')
                 <button> Disable 2FA </button>
             </form>

        @endif
    </div>
@endsection
