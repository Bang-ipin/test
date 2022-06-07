@extends('layouts.auth')

@section('content')
    
        <div class="login-wrapper fadeInDown animated">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('public/images/logo.png') }}"  alt="Logo" >
                </a>
            </div>
            
            <form method="POST" action="{{ route('login') }}" class="lobi-form login-form visible" id="form" >
                @csrf
                <div class="login-header">
                    Login Admin
                </div>
                <div class="login-body no-padding">
                    <fieldset>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <label class="input">
                                <span class="input-icon input-icon-prepend fa fa-user"></span>
                                <input id="email" type="email" class="form-control placeholder-no-fix @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">
                                <span class="tooltip tooltip-top-left"><i class="fa fa-user text-cyan-dark"></i> Please enter the email</span>
                            </label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <label class="input">
                                <span class="input-icon input-icon-prepend fa fa-key"></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <span class="tooltip tooltip-top-left"><i class="fa fa-key text-cyan-dark"></i> Please enter your password</span>
                            </label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            
                        </div>                        
                    </fieldset>
                </div>
            </form>
        </div>
    
@endsection