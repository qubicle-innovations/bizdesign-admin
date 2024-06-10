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
                        <div class="row">
                        <div class="mb-3">
                            <label class="col-md-2 col-form-label">Select Category</label>
                                <select name="category_id" class="form-select">
                                    <option>Select</option>
                                    @foreach($ServiceCategory as $key=>$category)
                                    <option @if($Service->category_id == $category->id) selected @endif
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Title</label>
                                <input type="text" class="form-control" id="validationCustom01" name="title"
                                    placeholder="Title" value="{{ old('title', $Service->title) }}" required>
                                <div class="invalid-feedback">
                                    Please enter title.
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                        <div class="row">
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
                            <div class="row">
                                <div class="mb-3">
                                    <img id="imgPreview" width="100px" height="100px"
                                        src="{{ asset('storage') }}/service/{{ $Service->logo }}" alt="pic" />
                                </div>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Section 1</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Small Title</label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            name="stitle_sub1" placeholder="Small Title"
                                            value="{{ old('stitle_sub1', $Service->stitle_sub1) }}" required>
                                        <div class="invalid-feedback">
                                            Please enter small title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Main Title</label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            name="mtitle_sub1" placeholder="Main Title"
                                            value="{{ old('mtitle_sub1', $Service->mtitle_sub1) }}" required>
                                        <div class="invalid-feedback">
                                            Please enter main title.
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $sections1 = $id != "" ? $Service->section1 : [];
                                    $oldCount = count($sections1);
                                @endphp
                                <div class="row">
                                    <div class="mb-3" id="clone-container">
                                        @if($oldCount != 0)
                                            @for ($i = 0; $i < $oldCount; $i++)
                                                <div class="row cloneable-fieldset">
                                                    <div class="form-group col-xl-3">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title_subsec1[]"
                                                            value="{{ $sections1[$i]['title'] }}" class="form-control" required>
                                                        <div class="invalid-feedback">
                                                            Please enter title.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xl-5">
                                                        <label for="description">Description</label>
                                                        <textarea name="description_subsec1[]" class="form-control"
                                                            required>{{ $sections1[$i]['description']}}</textarea>
                                                        <div class="invalid-feedback">
                                                            Please enter description.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xl-3">
                                                        <label for="image">Image</label>
                                                        <input type="file" name="image_subsec1[]"
                                                            class="form-control editimage_sec1">
                                                        <input type="hidden" name="edit_img1[]"
                                                            value="{{ $sections1[$i]['image'] }}">
                                                        <div class="invalid-feedback">
                                                            Please upload image.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xl-1 mt-4">
                                                        <button type="button" class="btn btn-danger remove-fieldset"><i
                                                                class="bx bxs-trash"></i></button>
                                                    </div>
                                                    <hr class="mt-3">
                                                </div>
                                            @endfor
                                        @else
                                            <div class="row cloneable-fieldset">
                                                <div class="form-group col-xl-3">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title_subsec1[]" class="form-control" required>
                                                    <div class="invalid-feedback">
                                                        Please enter title.
                                                    </div>
                                                </div>
                                                <div class="form-group col-xl-5">
                                                    <label for="description">Description</label>
                                                    <textarea name="description_subsec1[]" class="form-control"
                                                        required></textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter description.
                                                    </div>
                                                </div>
                                                <div class="form-group col-xl-3">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image_subsec1[]" class="form-control" required>
                                                    <div class="invalid-feedback">
                                                        Please upload image.
                                                    </div>
                                                </div>
                                                <div class="form-group col-xl-1 mt-4">
                                                    <button type="button" class="btn btn-danger remove-fieldset"><i
                                                            class="bx bxs-trash"></i></button>
                                                </div>
                                                <hr class="mt-3">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-xl-12">
                                        <button type="button" id="add-more" class="btn btn-success float-end"><i
                                                class='bx bx-plus'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Section 2</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Title</label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            name="title_sub2" placeholder="Title"
                                            value="{{ old('title_sub2', $Service->title_sub2) }}" required>
                                        <div class="invalid-feedback">
                                            Please enter title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Description 1
                                        </label>
                                        <textarea name="description_sub2" rows="5" class="form-control"
                                            placeholder="Description"
                                            required>{{ old('description_sub2', $Service->description_sub2) }}</textarea>
                                        <div class="invalid-feedback">
                                            Please enter description.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom05">Image</label>
                                        <input type="file" class="form-control" id="validationCustom05"
                                            name="image_sub2" placeholder="Image"
                                            @if(empty($Service->image_sub2)) required @endif>
                                        <div class="invalid-feedback">
                                            Please upload image.
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($Service->image_sub2))
                                    <div class="row">
                                        <div class="mb-3">
                                            <img id="imgPreview" width="100px" height="100px"
                                                src="{{ asset('storage') }}/service/{{ $Service->image_sub2 }}"
                                                alt="pic" />
                                        </div>
                                    </div>
                                @endif  
                              <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Description 2
                                        </label>
                                        <textarea name="description2_sub2" rows="5" class="form-control"
                                            placeholder="Description"
                                            required>{{ old('description2_sub2', $Service->description2_sub2) }}</textarea>
                                        <div class="invalid-feedback">
                                            Please enter description.
                                        </div>
                                    </div>
                                </div>

                                @php
                                    $sections2 = $id != "" ? json_decode($Service->points_sub2) : [];
                                    $oldCount2 = count($sections2);
                                @endphp

                                <div class="row">
                                    <div class="mb-3" id="clone-container2">
                                        @if($oldCount2 != 0)
                                            @for ($j = 0; $j < $oldCount2; $j++)
                                                <div class="row cloneable-sec2">
                                                    <div class="form-group col-xl-10">
                                                        <label for="title">Points</label>
                                                        <input type="text" name="points_sec2[]" value="{{ $sections2[$j] }}"
                                                            class="form-control" required>
                                                        <div class="invalid-feedback">
                                                            Please enter points.
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xl-2 mt-4">
                                                        <button type="button" class="btn btn-danger remove-sec2"><i
                                                                class="bx bxs-trash"></i></button>
                                                    </div>
                                                    <hr class="mt-3">
                                                </div>
                                            @endfor
                                        @else
                                            <div class="row cloneable-sec2">
                                                <div class="form-group col-xl-10">
                                                    <label for="title">Points</label>
                                                    <input type="text" name="points_sec2[]" class="form-control" required>
                                                    <div class="invalid-feedback">
                                                        Please enter points.
                                                    </div>
                                                </div>
                                                <div class="form-group col-xl-2 mt-4">
                                                    <button type="button" class="btn btn-danger remove-sec2"><i
                                                            class="bx bxs-trash"></i></button>
                                                </div>
                                                <hr class="mt-3">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-xl-12">
                                        <button type="button" id="add-more2" class="btn btn-success float-end"><i
                                                class='bx bx-plus'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Next</button>
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
    @endsection