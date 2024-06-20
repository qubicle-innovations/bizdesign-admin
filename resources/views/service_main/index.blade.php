@extends('layouts.master')
@section('css')
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@section('title')
Service Main
@endsection
@section('page-title')
Service Main
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service Main
                        @if($cnt==1)<a href="{{ url('admin/service/details/create') }}" type="button" class="btn btn-dark waves-effect waves-light float-end">Create</a>@endif
                    </h4>
                </div>

                <div class="card-body">
                    @if(!empty($errors->all()))
                        <p class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </p>
                    @endif
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                            {{ Session::get('message') }}
                        </p>
                    @endif
                    <table id="server-datatable" class="table dt-responsive nowrap w-100 actor_datatable">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Type</th>
                                <th>Small Title</th>
                                <th>Main Title</th>
                                <th style="display:none">Id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
    @endsection
    @section('scripts')
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            var url = "{{ url('admin/service/details') }}";
            var table = $('#server-datatable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url: url,
                },
                //pageLength: 2,
                order: [[2, 'desc']],
                columns: [{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {
                    data: 'btype',
                    name: 'btype'
                },
                {
                    data: 'stitle',
                    name: 'stitle'
                },
                {
                    data: 'mtitle',
                    name: 'mtitle'
                },
                {
                    data: 'id',
                    name: 'id',
                    visible: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                ]
            });
        });
    </script>
    @endsection