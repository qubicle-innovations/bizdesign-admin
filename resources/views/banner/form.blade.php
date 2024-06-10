@extends('layouts.master')
@section('title')
Home Banner
@endsection
@section('page-title')
Home Banner
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Home Banner
                        <a href="{{ url('admin/banner') }}" type="button"
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
                                <label class="form-label" for="validationCustom05">Images</label>
                                <input type="file" multiple class="form-control" id="validationCustom05" 
                                    placeholder="Upload Images" @if(empty($Banner->image)) name="images[]" required @else name="image" @endif>
                                <div class="invalid-feedback">
                                    Please upload images.
                                </div>
                            </div>
                        </div>
                        @if(!empty($Banner->image))
                            <div class="row">
                                <div class="mb-3">
                                    <img id="imgPreview" width="100px" height="100px"
                                        src="{{ asset('storage') }}/banners/{{ $Banner->image }}" alt="pic" />
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