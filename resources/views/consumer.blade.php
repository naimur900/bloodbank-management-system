@extends('layouts.app')
@section('content')
<div class="row pt-4">
    <div class="container">
        <!-- <div class="d-flex flex-wrap justify-content-lg-between">
            <div class="col-12 col-md-9">
                <h1> Available Bloods</h1>
            </div>
            <div class=" col-12 col-md-3">
                <span>
                    search by Blood Group
                </span>
                <span>
                    <select name="blood_group" class="custom-select col-4" id="">
                        <option value="" selected>Select</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </span>
            </div>
        </div> -->
        <div class="d-flex flex-wrap justify-content-center">
            @forelse ($hospitals as $hospital)
            <div class="card bg-light mb-3 text-gray-400 border-0 p-2 px-4 rounded-0 col-11 col-md-4">
                <div class="card-body bg-white border rounded-0 ">
                    <h5 class="card-title text-center">
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
                    </h5>
                    <h4 class="card-title text-center">
                        {{$hospital->name}}
                    </h4>
                    <div class="py-3 text-center">
                        <h5>
                            Available blood groups:
                        </h5>
                        <h6 class="text-danger">
                            @foreach ($available_blood_groups as $blood)
                            <span>
                                {{$blood->blood_group}} @if(!$loop->last),@endif
                            </span>
                            @endforeach
                        </h6>
                    </div>

                    <div class="text-center">
                        <address>
                            {{$hospital->address}}
                        </address>
                    </div>
                    <div class="text-center d-flex justify-content-center">
                        <div>
                            <p>
                                Contact at :- <a href="mailto:{{$hospital->email}}"> {{$hospital->email}}</a>
                            </p>
                            <p class="text-right pt-4 px-3">
                                <a href="{{route('consumer.showHospital',$hospital)}}" class="btn rounded-0 btn-danger">
                                    Show Deatil & Request Blood
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            @empty
            <div class="">
                <h2 class="text-danger">
                    No Hospitals Available
                </h2>
            </div>
            @endforelse

            {{-- <div class="card bg-light mb-3 text-gray-400 border-0 p-2 px-4 rounded-0 col-11 col-md-4">
                    <div class="card-body bg-white border rounded-0 ">
                        <h5 class="card-title text-center">
                            <svg
                                class="col-5"
                                xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 32 32" xml:space="preserve">
                                <style>.st0{fill:none;stroke:#E3342F;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}</style>
                                <path class="st0" d="M16 3L3 10v3h26v-3zM14 13h4v10h-4zM23 13h4v10h-4zM5 13h4v10H5zM3 23h26v3H3zM1 26h30v3H1z"/>
                            </svg>
                        </h5>
                        <h4 class="card-title text-center">
                            Hospital's Name
                        </h4>
                        <p class="py-3">
                            Available Blood Groups: 
                                <span class="text-danger">
                                    <span>
                                        A+,
                                    </span>
                                    <span>
                                        A-,
                                    </span>
                                    <span>
                                        AB+
                                    </span>
                                </span>
                        </p>
                        <p class="card-text">
                            <address>
                                
                            </address>
                        </p>
                        <p>
                            Contact at :- <a href="mailto:Zaa78692@gmail.com"> Zaa78692@gmail.com</a>
                        </p>
                        <p class="text-right pt-4 px-3">
                            <a href="http://" class="btn rounded-0 btn-danger">
                            Request Blood
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card bg-light mb-3 text-gray-400 border-0 p-2 px-4 rounded-0 col-11 col-md-4">
                    <div class="card-body bg-white border rounded-0 ">
                        <h5 class="card-title text-center">
                            <svg
                                class="col-5"
                                xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 32 32" xml:space="preserve">
                                <style>.st0{fill:none;stroke:#E3342F;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}</style>
                                <path class="st0" d="M16 3L3 10v3h26v-3zM14 13h4v10h-4zM23 13h4v10h-4zM5 13h4v10H5zM3 23h26v3H3zM1 26h30v3H1z"/>
                            </svg>
                        </h5>
                        <h4 class="card-title text-center">
                            Hospital's Name
                        </h4>
                        <p class="py-3">
                            Available Blood Groups: 
                                <span class="text-danger">
                                    <span>
                                        A+,
                                    </span>
                                    <span>
                                        A-,
                                    </span>
                                    <span>
                                        AB+
                                    </span>
                                </span>
                        </p>
                        <p class="card-text">
                            <address>
                             
                            </address>
                        </p>
                        <p>
                           
                        </p>
                        <p class="text-right pt-4 px-3">
                            <a href="http://" class="btn rounded-0 btn-danger">
                            Request Blood
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card bg-light mb-3 text-gray-400 border-0 p-2 px-4 rounded-0 col-11 col-md-4">
                    <div class="card-body bg-white border rounded-0 ">
                        <h5 class="card-title text-center">
                            <svg
                                class="col-5"
                                xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 32 32" xml:space="preserve">
                                <style>.st0{fill:none;stroke:#E3342F;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}</style>
                                <path class="st0" d="M16 3L3 10v3h26v-3zM14 13h4v10h-4zM23 13h4v10h-4zM5 13h4v10H5zM3 23h26v3H3zM1 26h30v3H1z"/>
                            </svg>
                        </h5>
                        <h4 class="card-title text-center">
                            Hospital's Name
                        </h4>
                        <p class="py-3">
                            Available Blood Groups: 
                                <span class="text-danger">
                                    <span>
                                        A+,
                                    </span>
                                    <span>
                                        A-,
                                    </span>
                                    <span>
                                        AB+
                                    </span>
                                </span>
                        </p>
                        <p class="card-text">
                            <address>
                              
                            </address>
                        </p>
                        <p>
                        </p>
                        <p class="text-right pt-4 px-3">
                            <a href="http://" class="btn rounded-0 btn-danger">
                            Request Blood
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card bg-light mb-3 text-gray-400 border-0 p-2 px-4 rounded-0 col-11 col-md-4">
                    <div class="card-body bg-white border rounded-0 ">
                        <h5 class="card-title text-center">
                            <svg
                                class="col-5"
                                xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 32 32" xml:space="preserve">
                                <style>.st0{fill:none;stroke:#E3342F;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}</style>
                                <path class="st0" d="M16 3L3 10v3h26v-3zM14 13h4v10h-4zM23 13h4v10h-4zM5 13h4v10H5zM3 23h26v3H3zM1 26h30v3H1z"/>
                            </svg>
                        </h5>
                        <h4 class="card-title text-center">
                            Hospital's Name
                        </h4>
                        <p class="py-3">
                            Available Blood Groups: 
                                <span class="text-danger">
                                    <span>
                                        A+,
                                    </span>
                                    <span>
                                        A-,
                                    </span>
                                    <span>
                                        AB+
                                    </span>
                                </span>
                        </p>
                        <p class="card-text">
                            <address>
                              
                            </address>
                        </p>
                        <p>
                        </p>
                        <p class="text-right pt-4 px-3">
                            <a href="http://" class="btn rounded-0 btn-danger">
                            Request Blood
                            </a>
                        </p>
                    </div>
                </div> --}}
        </div>
    </div>

</div>
@endsection