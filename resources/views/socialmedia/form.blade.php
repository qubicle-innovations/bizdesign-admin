@extends('layouts.master')
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
                        <a href="{{ url('admin/socialmedia') }}" type="button"
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
                                <label class="form-label" for="validationCustom01">Facebook Link</label>
                                <input type="text" class="form-control" id="validationCustom01" name="facebook"
                                    placeholder="Facebook Link" value="{{ old('facebook', $SocialMedia->facebook) }}"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter facebook link.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Instagram Link</label>
                                <input type="text" class="form-control" id="validationCustom01" name="instagram"
                                    placeholder="Instagram Link" value="{{ old('instagram', $SocialMedia->instagram) }}" required>
                                <div class="invalid-feedback">
                                    Please enter instagram link.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Twitter Link</label>
                                <input type="text" class="form-control" id="validationCustom01" name="twitter"
                                    placeholder="Twitter Link" value="{{ old('twitter', $SocialMedia->twitter) }}" required>
                                <div class="invalid-feedback">
                                    Please enter twitter link.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Snapchat Link</label>
                                <input type="text" class="form-control" id="validationCustom01" name="snapchat"
                                    placeholder="Snapchat Link" value="{{ old('snapchat', $SocialMedia->snapchat) }}" required>
                                <div class="invalid-feedback">
                                    Please enter snapchat link.
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