@extends('layouts.master')
@section('title')
Service Setup
@endsection
@section('page-title')
Service Setup
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service Setup
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
                                <label class="form-label" for="validationCustom01">Small Title</label>
                                <input type="text" class="form-control" id="validationCustom01" name="stitle"
                                    placeholder="Small Title" value="{{ old('stitle', $ServiceMain->stitle) }}"
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
                                    placeholder="Main Title" value="{{ old('mtitle', $ServiceMain->mtitle) }}"
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
                                <textarea name="description" rows="5" class="form-control" placeholder="Description"
                                    required>{{ old('description', $ServiceMain->description) }}</textarea>
                                <div class="invalid-feedback">
                                    Please enter description.
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

    <script>
        $(document).ready(function () {
            $('#add-more').click(function () {
                var clone = $('.cloneable-fieldset:first').clone();
                clone.find('input, textarea').val('');
                clone.find('.editimage_sec1').attr("required", true);
                clone.appendTo('#clone-container');
            });

            $(document).on('click', '.remove-fieldset', function () {
                if ($('.cloneable-fieldset').length > 1) {
                    $(this).closest('.cloneable-fieldset').remove();
                } else {
                    alert('At least one set of fields is required.');
                }
            });

            $('#add-more2').click(function () {
                var clone = $('.cloneable-sec2:first').clone();
                clone.find('input, textarea').val('');
                clone.find('.editimage_sec2').attr("required", true);
                clone.appendTo('#clone-container2');
            });

            $(document).on('click', '.remove-sec2', function () {
                if ($('.cloneable-sec2').length > 1) {
                    $(this).closest('.cloneable-sec2').remove();
                } else {
                    alert('At least one set of fields is required.');
                }
            });
        });
    </script>
    @endsection