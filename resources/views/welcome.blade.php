@extends('layouts.template')

@section('includes')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="box" action="{{ route('app.check') }}" method="POST" >
                    @csrf
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p> 
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                     <input type="password" name="password" placeholder="Password">
                     <input type="submit">
                     @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="text-danger">
                            {{$error}}
                        </div>
                        @endforeach
                    @endif                        
                    <div class="col-md-12">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection