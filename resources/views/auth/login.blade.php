@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-0">
                <div class="card-header bg-danger rounded-0 text-white">{{ __('Login') }}</div>

                <div class="card-body">
                    <div class="pb-2">
                        @if ($type=='consumer')
                        <p class="d-flex justify-content-center">
                            <svg class="col-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15">
                                <path fill="#E3342F"
                                    d="M11.2 7.1L7.5 2 3.8 7.1c-.5.7-.8 1.6-.8 2.5C3 12 5 14 7.5 14S12 12 12 9.6c0-.9-.3-1.8-.8-2.5zM10 10H8v2H7v-2H5V9h2V7h1v2h2v1z" />
                            </svg>
                        </p>
                        <h4 class="d-flex justify-content-center text-danger">
                            Login as Consumer
                        </h4>
                        @else
                        <p class="d-flex justify-content-center ">
                            <svg class="col-2" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 32 32"
                                xml:space="preserve">
                                <style>
                                .st0 {
                                    fill: none;
                                    stroke: #E3342F;
                                    stroke-width: 2;
                                    stroke-linecap: round;
                                    stroke-linejoin: round;
                                    stroke-miterlimit: 10
                                }
                                </style>
                                <path class="st0"
                                    d="M16 3L3 10v3h26v-3zM14 13h4v10h-4zM23 13h4v10h-4zM5 13h4v10H5zM3 23h26v3H3zM1 26h30v3H1z" />
                            </svg>
                        </p>
                        <h4 class="d-flex justify-content-center text-danger">
                            Hospital login
                        </h4>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control rounded-0 @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="type" value="{{$type}}">
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control rounded-0 @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection