@extends('_admin.master') 
@section('header')
@php
    $image = ['/dist/img/hendra-pontomudis-70551-unsplash.jpg', '/dist/img/fezbot2000-536032-unsplash.jpg', '/dist/img/keith-zhu-638314-unsplash.jpg', '/dist/img/sander-wehkamp-502276-unsplash.jpg'];
    $key = array_rand($image);
@endphp
<style type="text/css">
    body {
     background-image: url("{{ $image[$key] }}");
     background-repeat: no-repeat; 
    background-size: cover; 
    background-position: center; 
    }
</style>

@endsection
@section('content')
<div class="login-box">
    <div class="login-logo">
        Administrator
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Login') }}</p>
            @if ($errors->any())
              <div class="alert alert-warning alert-dismissible fade show">
                {{ $errors->first() }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <form action="{{ route('admin-login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required autofocus>
                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span> 
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>
                    <div class="input-group-append">
                        <span class="fa fa-user input-group-text"></span> 
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection