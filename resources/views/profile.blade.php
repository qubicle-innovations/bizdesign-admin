@extends('layouts.master')
@section('title')
Profile Settings
@endsection
@section('page-title')
Profile Settings
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Settings</h4>
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
                    <form class="needs-validation" novalidate method="post" action="{{ url('admin/update_password') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Email</label>
                                <input type="email" class="form-control" id="validationCustom01" name="email"
                                    placeholder="Email" value="{{ Auth::user()->email }}" required>
                                <div class="invalid-feedback">
                                    Please enter email.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Current Password
                                </label>
                                <input type="password" class="form-control" id="validationCustom02"
                                    name="current_password" placeholder="Current Password" value="" required>
                                <div class="invalid-feedback">
                                    Please enter current password.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom03">New Password
                                </label>
                                <input type="password" class="form-control" id="validationCustom03" name="new_password"
                                    placeholder="New Password" required>
                                <div class="invalid-feedback">
                                    Please enter new password.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Confirm Password</label>
                                <input type="password" class="form-control" id="validationCustom04"
                                    name="new_password_confirmation" placeholder="Confirm Password" required>
                                <div class="invalid-feedback">
                                    Please enter confirm password.
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