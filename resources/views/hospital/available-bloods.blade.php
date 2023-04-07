@extends('hospital.dashboard-layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Available Blood</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">

                            <table class="table table-bordered dataTable" id="dataTable" role="grid"
                                aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 58.517px;"
                                            aria-label="Position: activate to sort column ascending">Blood Group</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 112.517px;"
                                            aria-label="Office: activate to sort column ascending">Unit</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 93.7833px;"
                                            aria-label="Salary: activate to sort column ascending">Last Updated</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 104.1px;"
                                            aria-label="Start date: activate to sort column ascending">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($bloods as $blood)

                                    <tr role="row" class="even">
                                        <td>{{$blood->blood_group}}</td>
                                        <td>{{$blood->unit}}</td>
                                        <td>{{$blood->updated_at}}</td>
                                        <td>
                                            <form action="{{route('hospital.addBlood')}}" method="post">
                                                @csrf
                                                <div class="input-group mb-3 col-8">
                                                    <input type="hidden" name="blood_group"
                                                        value="{{$blood->blood_group}}">
                                                    <input type="number" min="0" name="unit" class="form-control"
                                                        placeholder="Units" aria-label="Units"
                                                        aria-describedby="button-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="submit"
                                                            id="button-addon2">Add</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection