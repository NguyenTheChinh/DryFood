@extends('layouts.app1')

@section('content')

<section class="logo text-center">
    <img src="/uploadMedia/images/logo.png" alt="" class="img-responsive" style="margin : 0px auto">
</section>



<section class="loginForm">
    <div class="container">
        <div class="blockTitle">
            <h2>
                <a href="javacript:void(0)">
                    Login admin
                </a>
            </h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-md-push-2">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="username" class="col-md-2 col-form-label text-md-right">UserName</label>
    
                                <div class="col-md-8">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? '
                                    is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
    
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-8 col-md-push-2">
                                    <div class="form-check pull-right">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 col-md-push-2">
                                    <button type="submit" class="btn btn-primary pull-right">
                                        {{ __('Đăng nhập') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
