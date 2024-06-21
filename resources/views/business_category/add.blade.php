@extends('layouts.master')
@section('title')
Business Setup
@endsection
@section('page-title')
Business Setup
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Business Setup
                        <a href="{{ url('admin/business/category') }}" type="button"
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
                                <label class="form-label no-display" for="validationCustom01">Title</label>
                                <input type="text" class="form-control" id="validationCustom01" name="title"
                                    placeholder="Title" @if(!empty($Business_Category->title)) readOnly @endif value="{{ old('title', $Business_Category->title) }}" required>
                                <div class="invalid-feedback">
                                    Please enter title.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Detailed Description</label>
                                <textarea name="detailed_text" id="editor" rows="20" class="form-control detailed_text"
                                    placeholder="Detailed Description"
                                    required>{{ old('detailed_text', $Business_Category->detailed_text) }}</textarea>
                                <div class="invalid-feedback">
                                    Please enter detailed description.
                                </div>
                            </div>
                        </div>
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