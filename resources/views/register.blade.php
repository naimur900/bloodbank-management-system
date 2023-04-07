@extends('layouts.app')
@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-sm-6 py-2">
            <div class="card rounded-0">
                <div class="card-body text-center">
                    <p>
                        <svg class="col-4" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 32 32"
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
                    <h5 class="card-title">Do you save lives? </h5>
                    <p class="card-text">Register yourself as Blood Bank.</p>
                    <p class=" py-4 d-flex justify-content-center">
                        <a href="{{route('register.form',['type'=>'hospital'])}}" class="btn btn-primary">Hospital
                            Registration</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 py-2">
            <div class="card rounded-0">
                <div class="card-body text-center">
                    <p>
                        <svg class="col-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15">
                            <path fill="#E3342F"
                                d="M11.2 7.1L7.5 2 3.8 7.1c-.5.7-.8 1.6-.8 2.5C3 12 5 14 7.5 14S12 12 12 9.6c0-.9-.3-1.8-.8-2.5zM10 10H8v2H7v-2H5V9h2V7h1v2h2v1z" />
                        </svg>
                    </p>
                    <h5 class="card-title">Do you need Blood ?</h5>
                    <p class="card-text">Register yourself as Blood Bank.</p>
                    <p class=" py-4 d-flex justify-content-center">
                        <a href="{{route('register.form',['type'=>'consumer'])}}" class="btn btn-primary">Register as
                            Consumer</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection