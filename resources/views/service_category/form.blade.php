@extends('layouts.master')
@section('title')
Service Category
@endsection
@section('page-title')
Service Category
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service Category
                        <a href="{{ url('admin/service') }}" type="button"
                            class="btn btn-dark waves-effect waves-light float-end">Back</a>
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
                    <form class="needs-validation" novalidate method="post" action="{{ $action_url }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Category Name</label>
                                <input type="text" class="form-control" id="validationCustom01" name="name"
                                    placeholder="Category Name" value="{{ old('name', $ServiceCategory->name) }}"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter category name.
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
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
    @endsection