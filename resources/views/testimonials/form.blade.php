@extends('layouts.master')
@section('title')
Testimonials
@endsection
@section('page-title')
Testimonials
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Testimonials
                        <a href="{{ url('admin/testimonials') }}" type="button"
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
                                <label class="form-label" for="validationCustom01">Name</label>
                                <input type="text" class="form-control" id="validationCustom01" name="name"
                                    placeholder="Name" value="{{ old('name', $Testimonials->name) }}"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter name.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Company Name</label>
                                <input type="text" class="form-control" id="validationCustom01" name="company_name"
                                    placeholder="Company Name" value="{{ old('company_name', $Testimonials->company_name) }}" required>
                                <div class="invalid-feedback">
                                    Please enter company name.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Description
                                </label>
                                <textarea name="description" rows="5" class="form-control" placeholder="Description"
                                    required>{{ old('description', $Testimonials->description) }}</textarea>
                                <div class="invalid-feedback">
                                    Please enter description.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom05">Image</label>
                                <input type="file" class="form-control" id="validationCustom05" name="image"
                                    placeholder="Image" @if(empty($Testimonials->image)) required @endif>
                                <div class="invalid-feedback">
                                    Please upload image.
                                </div>
                            </div>
                        </div>
                        @if(!empty($Testimonials->image))
                            <div class="row">
                                <div class="mb-3">
                                    <img id="imgPreview" width="100px" height="100px"
                                        src="{{ asset('storage') }}/testimonials/{{ $Testimonials->image }}" alt="pic" />
                                </div>
                            </div>
                        @endif                          
                        
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