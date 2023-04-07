@extends('layouts.app')
@section('content')
<div class="row">
    <div class="container mt-2">
        <div class="">
            <div class=" d-flex flex-wrap py-4">
                <div class="col-12 text-center col-md-4">
                    <svg class="col-5" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 32 32"
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
                </div>
                <div class="col-12 col-md-8">
                    <h2>{{$hospital->name}}</h2>
                    <p>
                        {{$hospital->decription??''}}
                    </p>
                    <p>
                        <!-- <h5 class="py-2">
                                Conatct Details :
                            </h5> -->
                    <h6>
                        {{$hospital->address}}
                    </h6>
                    <h6>
                        {{$hospital->email}}
                    </h6>
                    </p>
                </div>
            </div>
            <div>
                <table class="table table-bordered dataTable" id="dataTable" role="grid"
                    aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                style="width: 58.517px;" aria-label="Position: activate to sort column ascending">Blood
                                Group</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                style="width: 112.517px;" aria-label="Office: activate to sort column ascending">Unit
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                style="width: 93.7833px;" aria-label="Salary: activate to sort column ascending">Last
                                Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($availableBlood as $blood)
                        <tr role="row" class="even">
                            <td>{{$blood->blood_group}}</td>
                            <td>{{$blood->unit}}</td>
                            <td>{{$blood->updated_at}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @guest
            <h4 class="py-2 text-danger">
                Please register youself to make blood request (Login if already registered).
            </h4>
            @endguest
            <form action="{{route('consumer.sendRequest',$hospital)}}" method="POST">
                <div class="d-flex flex-wrap">
                    <h4 class="col-4">
                        Make Blood Request
                    </h4>
                    <div class="input-group mb-3 col-8 justify-content-end ">
                        @csrf
                        <input type="number" min="0" name="unit" value="{{old('unit')}}"
                            class="form-control mx-4 col-2 @error('unit') is-invalid @enderror" placeholder="Units"
                            aria-label="Units" aria-describedby="button-addon2" @guest disabled @else
                            @if(Auth::user()->is_hospital) disabled @endif @endguest>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="button-addon2" @guest disabled @else
                                @if(Auth::user()->is_hospital) disabled @endif @endguest>Request</button>
                        </div>
                        @error('blood_group')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        @error('unit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
@endsection