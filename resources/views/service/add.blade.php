@extends('layouts.master')
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
                        <div class="row no-display">
                            <div class="mb-3">
                                <label class="col-md-2 col-form-label">Select Service Type</label>
                                <select name="service_type" class="form-select service_type">
                                    <option>Select</option>
                                    <option @if($Service->type == "old") selected @endif value="old">Already Own Business?
                                    </option>
                                    <option @if($Service->type == "new") selected @endif value="new">New Business</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label no-display" for="validationCustom01">Title</label>
                                <input type="text" class="form-control" id="validationCustom01" name="title"
                                    placeholder="Title" @if(!empty($Service->title)) readOnly @endif value="{{ old('title', $Service->title) }}" required>
                                <div class="invalid-feedback">
                                    Please enter title.
                                </div>
                            </div>
                        </div>
                        <div class="row no-display">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Description
                                </label>
                                <textarea name="description" rows="5" class="form-control" placeholder="Description"
                                    required>{{ old('description', $Service->description) }}</textarea>
                                <div class="invalid-feedback">
                                    Please enter description.
                                </div>
                            </div>
                        </div>
                        <div class="row no-display">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom05">Logo</label>
                                <input type="file" class="form-control" id="validationCustom05" name="logo"
                                    placeholder="Logo" @if(empty($Service->logo)) required @endif>
                                <div class="invalid-feedback">
                                    Please upload logo.
                                </div>
                            </div>
                        </div>
                        @if(!empty($Service->logo))
                            <div class="row no-display">
                                <div class="mb-3">
                                    <img id="imgPreview" width="100px" height="100px"
                                        src="{{ asset('storage') }}/service/{{ $Service->logo }}" alt="pic" />
                                </div>
                            </div>
                        @endif
                        <div class="row service_bgimage no-display">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom05">Background Image</label>
                                <input type="file" class="form-control back_image" id="validationCustom05"
                                    name="back_image" placeholder="Background Image" @if(empty($Service->back_image))
                                    required @endif>
                                <div class="invalid-feedback">
                                    Please upload background image.
                                </div>
                            </div>
                        </div>
                        @if(!empty($Service->back_image))
                            <div class="row no-display">
                                <div class="mb-3">
                                    <img id="imgPreview" width="100px" height="100px"
                                        src="{{ asset('storage') }}/service/{{ $Service->back_image }}" alt="pic" />
                                </div>
                            </div>
                        @endif
                        <!-- <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body"> -->
                                <div class="row">
                                    <div class="mb-3"> 
                                        <label class="form-label" for="validationCustom02">Detailed Description</label>
                                        <textarea name="detailed_text" id="editor" rows="20" class="form-control detailed_text" placeholder="Detailed Description" required>{{ old('detailed_text', $Service->detailed_text) }}</textarea>
                                        <div class="invalid-feedback">
                                            Please enter detailed description.
                                        </div>
                                    </div>
                                </div>
                            <!-- </div>
                        </div> -->
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
    @endsection
    @section('scripts')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.service_type').change(function () {
                if ($(this).val() === 'old') {
                    $('.service_cat').hide();
                    $('.category_id').attr("required", false);
                    $('.back_image').attr("required", false);
                    $('.service_bgimage').hide();
                } else {
                    $('.service_cat').show();
                    $('.category_id').attr("required", true);
                    $('.back_image').attr("required", true);
                    $('.service_bgimage').show();
                }
            });

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
                clone.find('input').val('');
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
     <script>
        CKEDITOR.replace('editor', {
            allowedContent: true, // Allows all content
            extraAllowedContent: 'div[*]; img[*]{*}; section[*]', // Allow specific tags and attributes
            // You can add more configurations here
            height: 300,
        removePlugins: 'elementspath', // Optional: Remove the element path plugin
        toolbar: [] // Optional: Hide the toolbar
        });
    </script>
    @endsection