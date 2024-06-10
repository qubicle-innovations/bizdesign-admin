@extends('layouts.master')
@section('css')
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@section('title')
Social Media Management
@endsection
@section('page-title')
Social Media Management
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Social Media Management
                        @if($cnt == 0)<a href="{{ url('admin/socialmedia/create') }}" type="button"
                        class="btn btn-dark waves-effect waves-light float-end">Create</a>@endif
                    </h4>
                </div>

                <div class="card-body">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                <th>Facbook</th>
                                <th>Instagram</th>
                                <th>Twitter</th>
                                <th>Snapchat</th>
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
            var url = "{{ url('admin/socialmedia') }}";
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
                    data: 'facebook',
                    name: 'facebook'
                },
                {
                    data: 'instagram',
                    name: 'instagram'
                },
                {
                    data: 'twitter',
                    name: 'twitter'
                },
                {
                    data: 'snapchat',
                    name: 'snapchat'
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