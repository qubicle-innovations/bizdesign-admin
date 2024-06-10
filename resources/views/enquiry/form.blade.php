@extends('layouts.master')
@section('title')
Enquiry Management
@endsection
@section('page-title')
Enquiry Management
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Enquiry Management
                        <a href="{{ url('admin/enquiry') }}" type="button"
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
                                <label class="form-label" for="validationCustom01">Samll Title</label>
                                <input type="text" class="form-control" id="validationCustom01" name="stitle"
                                    placeholder="Samll Title" value="{{ old('stitle', $Enquiry->stitle) }}"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter small title.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Main Title</label>
                                <input type="text" class="form-control" id="validationCustom01" name="mtitle"
                                    placeholder="Main Title" value="{{ old('mtitle', $Enquiry->mtitle) }}" required>
                                <div class="invalid-feedback">
                                    Please enter main title.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Description
                                </label>
                                <textarea name="description" rows="5" class="form-control" placeholder="Description"
                                    required>{{ old('description', $Enquiry->description) }}</textarea>
                                <div class="invalid-feedback">
                                    Please enter description.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom05">Image</label>
                                <input type="file" class="form-control" id="validationCustom05" name="image"
                                    placeholder="Image" @if(empty($Enquiry->image)) required @endif>
                                <div class="invalid-feedback">
                                    Please upload image.
                                </div>
                            </div>
                        </div>
                        @if(!empty($Enquiry->image))
                            <div class="row">
                                <div class="mb-3">
                                    <img id="imgPreview" width="100px" height="100px"
                                        src="{{ asset('storage') }}/enquiry/{{ $Enquiry->image }}" alt="pic" />
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