@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-0">
                <div class="card-header bg-danger rounded-0 text-white">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control rounded-0 @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control rounded-0 @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            {{-- @php
                                print_r($errors->all());
                            @endphp --}}
                        </div>
                        <input type="text" name="type" value="{{$type}}" hidden>
                        @consumer
                        <div class="form-group row">
                            <label for="blood_group"
                                class="col-md-4 col-form-label text-md-right">{{ __('Blood Group') }}</label>
                            <div class="col-md-6">
                                <select name="blood_group"
                                    class="form-control rounded-0 @error('blood_group') is-invalid @enderror"
                                    id="blood_group" required>
                                    <option value="">Select</option>
                                    <option value="A+" {{ old('blood_group')==='A+'?'seleted="true"':'' }}>A+</option>
                                    <option value="A-" {{ old('blood_group')==='A-'?'seleted="true"':'' }}>A-</option>
                                    <option value="B+" {{ old('blood_group')==='B+'?'seleted="true"':'' }}>B+</option>
                                    <option value="B-" {{ old('blood_group')==='B-'?'seleted="true"':'' }}>B-</option>
                                    <option value="AB+" {{ old('blood_group')==='AB+'?'seleted="true"':'' }}>AB+
                                    </option>
                                    <option value="AB-" {{ old('blood_group')==='AB-'?'seleted="true"':'' }}>AB-
                                    </option>
                                    <option value="O+" {{ old('blood_group')==='O+'?'seleted="true"':'' }}>O+</option>
                                    <option value="O-" {{ old('blood_group')==='O-'?'seleted="true"':'' }}>O-</option>
                                </select>
                                @error('blood_group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endconsumer

                        <div class="form-group row">
                            <label for="address"
                                class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control rounded-0 @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control rounded-0 @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control rounded-0"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection