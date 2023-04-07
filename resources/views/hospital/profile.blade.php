@extends('hospital.dashboard-layout')
@section('content')
    <div class="d-flex flex-wrap">
        <div class="col-5 p-2 text-center">
                {{-- <img class="rounded-circle" src="" alt=""> --}}
                <svg
                    class="col-6 "
                    xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 32 32" xml:space="preserve">
                    <style>.st0{fill:none;stroke:#E3342F;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10}</style>
                    <path class="st0" d="M16 3L3 10v3h26v-3zM14 13h4v10h-4zM23 13h4v10h-4zM5 13h4v10H5zM3 23h26v3H3zM1 26h30v3H1z"/>
                </svg>
        </div>
        <div class="col-7 p-2">
            <div class="text-right">
                <a onclick="BloodBank.toggleTags(['#editBtn','#cancelBtn','#detailsForm','#details'])">
                    <span class="btn btn-info" id="editBtn">Edit</span>
                    <span class="btn btn-danger d-none" id="cancelBtn">Cancel</span>
                </a>
            </div>
            <div id="details" id="details">
                <h2>
                    {{$profile->name}}
                </h2>
                <p>
                    {{$profile->description}}
                </p>
                <h4>Address : </h4>
                <address>
                    {{$profile->address}}
                </address>
                
            </div>
            <div id="detailsForm" class="d-none">
                <form action="{{route('hospital.profile.update')}}" method="POST">
                    @csrf
                    <h2 class="input-group">
                        <input type="text"
                        class=" form-control" style="font-size: 2rem"
                        value="{{$profile->name}}"
                        name="name"
                        >
                    </h2>
                    <p class="input-group">
                        <textarea name="description" class="col-12 form-control">{{$profile->description}}</textarea>
                    </p>
                    <h4>Address : </h4>
                    <address class="input-group">
                        <textarea name="address" class="form-control">{{$profile->address}}</textarea>
                    </address>
                    <p class="text-right px-4">
                        <button class="btn btn-primary" type="submit">
                            Save
                        </button>
                    </p>
                </form>
            </div>  
        </div>
    </div>
@endsection