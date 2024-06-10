@extends('layouts.master')
@section('css')
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@section('title')
About Us
@endsection
@section('page-title')
About Us
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">About Us
                        @if($cnt==0)<a href="{{ url('admin/aboutus/create') }}" type="button" class="btn btn-dark waves-effect waves-light float-end">Create</a>@endif
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
                                <th>Small Title 1</th>
                                <th>Main Title 1</th>
                                <th>Small Title 2</th>
                                <th>Main Title 2</th>
                                <th>Small Title 3</th>
                                <th>Main Title 3</th>
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
            var url = "{{ url('admin/aboutus') }}";
            var table = $('#server-datatable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url: url,
                },
                //pageLength: 2,
                order: [[3, 'desc']],
                columns: [{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {
                    data: 'stitle_1',
                    name: 'stitle_1'
                },
                {
                    data: 'mtitle_1',
                    name: 'mtitle_1'
                },
                {
                    data: 'stitle_2',
                    name: 'stitle_2'
                },
                {
                    data: 'mtitle_2',
                    name: 'mtitle_2'
                },
                {
                    data: 'stitle_3',
                    name: 'stitle_3'
                },
                {
                    data: 'mtitle_3',
                    name: 'mtitle_3'
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