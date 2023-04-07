@extends('hospital.dashboard-layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Blood Requests</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            @if (!$BloodRequests->count())
                            <h3 class="text-center">
                                No Data Found
                            </h3>
                            @else

                            <table class="table table-bordered dataTable" id="dataTable" role="grid"
                                aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 148.517px;" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 58.517px;"
                                            aria-label="Position: activate to sort column ascending">Blood Group</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 52.517px;"
                                            aria-label="Office: activate to sort column ascending">Unit</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 61.517px;"
                                            aria-label="Salary: activate to sort column ascending">Request date</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 93.7833px;"
                                            aria-label="Salary: activate to sort column ascending">Respond date</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 104.1px;"
                                            aria-label="Start date: activate to sort column ascending">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($BloodRequests as $request)
                                    <tr role="row" class="odd">
                                        <td>{{$request->requested_by}}</td>
                                        <td>{{$request->blood_group}}</td>
                                        <td>{{$request->unit}}</td>
                                        <td>{{$request->requested_at}}</td>
                                        <td>{{$request->responded_at}}</td>
                                        <td>
                                            @if ($request->is_pending)

                                            <form class="hidden" id="accept-{{$request->id}}"
                                                action="{{route('hospital.handleRequests')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="request_id" value="{{$request->id}}">
                                                <input type="hidden" name="status" value="approved">
                                            </form>
                                            <form class="hidden" id="decline-{{$request->id}}"
                                                action="{{route('hospital.handleRequests')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="request_id" value="{{$request->id}}">
                                                <input type="hidden" name="status" value="Decline">
                                            </form>
                                            <div class="d-inline-flex">
                                                <button
                                                    onclick="if(confirm('Are you sure to accept ?'))$('#accept-{{$request->id}}').submit()"
                                                    href="http://" class="btn btn-success m-1">
                                                    Approve
                                                </button>
                                                <button
                                                    onclick="if(confirm('Are You Sure to decline ?'))$('#decline-{{$request->id}}').submit()"
                                                    class="btn btn-danger m-1">
                                                    Decline
                                                </button>
                                            </div>
                                            @else
                                            @if ($request->isAccepted)
                                            <span class="px-2 py-1 text-success">
                                                Accepeted
                                            </span>
                                            @else
                                            <span class="px-2 py-1 text-danger">
                                                Declined
                                            </span>
                                            @endif

                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            @endif

                        </div>
                    </div>
                    <div class="row">
                        {{-- {{$BloodRequests->links()}} --}}
                        {{$BloodRequests->links('vendor.pagination.bootstrap-4')}}

                        {{-- <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1
                                to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a
                                            href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                            class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable"
                                            data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable"
                                            data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#"
                                            aria-controls="dataTable" data-dt-idx="7" tabindex="0"
                                            class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection