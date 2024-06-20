@extends('layouts.master')
@section('css')
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@section('title')
Service
@endsection
@section('page-title')
Service
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service
                        <a href="{{ url('admin/service/create') }}" type="button"
                            class="btn btn-dark waves-effect waves-light float-end">Create</a>
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
                                <th>Type</th>
                                <th>Title</th>
                                <th>Logo</th>
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
            var url = "{{ url('admin/service') }}";
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
                    data: 'btype',
                    name: 'btype'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'img',
                    name: 'logo'
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });


        function delete_record(category_id) {
            var userURL = '<?php echo url("admin/service/delete"); ?>/' + category_id;

            if (confirm("Are you sure you want to delete this record?") == true) {
                $.ajax({
                    url: userURL,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        var messages = $('.messages');
                        $('#server-datatable').DataTable().ajax.reload();
                        var msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                        msg += data.success;
                        msg += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                        msg += '</div>';
                        $(messages).html(msg);
                    }
                });
            }
        }
    </script>
    @endsection