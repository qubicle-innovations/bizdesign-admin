@extends('layouts.master')
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
                        <a href="{{ url('admin/aboutus') }}" type="button"
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
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Section 1</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Small Title</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="stitle_1"
                                            placeholder="Small Title" value="{{ old('stitle_1', $Aboutus->stitle_1) }}"
                                            required>
                                        <div class="invalid-feedback">
                                            Please enter small title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Main Title</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="mtitle_1"
                                            placeholder="Main Title" value="{{ old('mtitle_1', $Aboutus->mtitle_1) }}"
                                            required>
                                        <div class="invalid-feedback">
                                            Please enter main title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Description
                                        </label>
                                        <textarea name="description_1" rows="5"
                                            class="form-control" placeholder="Description"
                                            required>{{ old('description_1', $Aboutus->description_1) }}</textarea>
                                        <div class="invalid-feedback">
                                            Please enter description.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom05">Image</label>
                                        <input type="file" class="form-control" id="validationCustom05" name="image_1"
                                            placeholder="Image"
                                            @if(empty($Aboutus->image_1)) required @endif>
                                        <div class="invalid-feedback">
                                            Please upload image.
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($Aboutus->image_1))
                                    <div class="row">
                                        <div class="mb-3">
                                            <img id="imgPreview" width="100px" height="100px"
                                                src="{{ asset('storage') }}/aboutus/{{ $Aboutus->image_1 }}" alt="pic" />
                                        </div>
                                    </div>
                                @endif  
                          </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Section 2</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Small Title</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="stitle_2"
                                            placeholder="Small Title" value="{{ old('stitle_2', $Aboutus->stitle_2) }}"
                                            required>
                                        <div class="invalid-feedback">
                                            Please enter small title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Main Title</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="mtitle_2"
                                            placeholder="Main Title" value="{{ old('mtitle_2', $Aboutus->mtitle_2) }}"
                                            required>
                                        <div class="invalid-feedback">
                                            Please enter main title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Description
                                        </label>
                                        <textarea name="description_2" rows="5"
                                            class="form-control" placeholder="Description"
                                            required>{{ old('description_2', $Aboutus->description_2) }}</textarea>
                                        <div class="invalid-feedback">
                                            Please enter description.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom05">Image</label>
                                        <input type="file" class="form-control" id="validationCustom05" name="image_2"
                                            placeholder="Image"
                                            @if(empty($Aboutus->image_2)) required @endif>
                                        <div class="invalid-feedback">
                                            Please upload image.
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($Aboutus->image_2))
                                    <div class="row">
                                        <div class="mb-3">
                                            <img id="imgPreview" width="100px" height="100px"
                                                src="{{ asset('storage') }}/aboutus/{{ $Aboutus->image_2 }}" alt="pic" />
                                        </div>
                                    </div>
                                @endif  

                          </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Section 3</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Small Title</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="stitle_3"
                                            placeholder="Small Title" value="{{ old('stitle_3', $Aboutus->stitle_3) }}"
                                            required>
                                        <div class="invalid-feedback">
                                            Please enter small title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Main Title</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="mtitle_3"
                                            placeholder="Main Title" value="{{ old('mtitle_3', $Aboutus->mtitle_3) }}"
                                            required>
                                        <div class="invalid-feedback">
                                            Please enter main title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Description
                                        </label>
                                        <textarea name="description_3" rows="5"
                                            class="form-control" placeholder="Description"
                                            required>{{ old('description_3', $Aboutus->description_3) }}</textarea>
                                        <div class="invalid-feedback">
                                            Please enter description.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom05">Image</label>
                                        <input type="file" class="form-control" id="validationCustom05" name="image_3"
                                            placeholder="Image" @if(empty($Aboutus->image_3)) required @endif>
                                        <div class="invalid-feedback">
                                            Please upload image.
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($Aboutus->image_3))
                                    <div class="row">
                                        <div class="mb-3">
                                            <img id="imgPreview" width="100px" height="100px"
                                                src="{{ asset('storage') }}/aboutus/{{ $Aboutus->image_3 }}" alt="pic" />
                                        </div>
                                    </div>
                                @endif  

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