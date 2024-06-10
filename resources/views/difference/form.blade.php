@extends('layouts.master')
@section('title')
The Difference
@endsection
@section('page-title')
The Difference
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">The Difference
                        <a href="{{ url('admin/difference') }}" type="button"
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
                                            placeholder="Small Title"
                                            value="{{ old('stitle_1', $Difference->stitle_1) }}" required>
                                        <div class="invalid-feedback">
                                            Please enter small title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Main Title</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="mtitle_1"
                                            placeholder="Main Title"
                                            value="{{ old('mtitle_1', $Difference->mtitle_1) }}" required>
                                        <div class="invalid-feedback">
                                            Please enter main title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Description
                                        </label>
                                        <textarea name="description_1" rows="5" class="form-control"
                                            placeholder="Description"
                                            required>{{ old('description_1', $Difference->description_1) }}</textarea>
                                        <div class="invalid-feedback">
                                            Please enter description.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom05">Image</label>
                                        <input type="file" class="form-control" id="validationCustom05" name="image_1"
                                            placeholder="Image" @if(empty($Difference->image_1)) required @endif>
                                        <div class="invalid-feedback">
                                            Please upload image.
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($Difference->image_1))
                                    <div class="row">
                                        <div class="mb-3">
                                            <img id="imgPreview" width="100px" height="100px"
                                                src="{{ asset('storage') }}/difference/{{ $Difference->image_1 }}" alt="pic" />
                                        </div>
                                    </div>
                                @endif  
                                @php
                                    $sections1 = $id != "" ? json_decode($Difference->points_1) : [];
                                    $oldCount = count($sections1);
                                @endphp
                                <div class="row">
                                    <div class="mb-3" id="clone-container">
                                        @if($oldCount != 0)
                                            @for ($i = 0; $i < $oldCount; $i++)
                                                <div class="row cloneable-fieldset">
                                                    <div class="form-group col-xl-10">
                                                        <label for="title">Points</label>
                                                        <input type="text" name="points_sec1[]"
                                                            value="{{ $sections1[$i] }}" class="form-control"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter points.
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
                                                <div class="form-group col-xl-10">
                                                    <label for="title">Points</label>
                                                    <input type="text" name="points_sec1[]" class="form-control" required>
                                                    <div class="invalid-feedback">
                                                        Please enter points.
                                                    </div>
                                                </div>
                                                <div class="form-group col-xl-2 mt-4">
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
                                        <label class="form-label" for="validationCustom01">Small Title</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="stitle_2"
                                            placeholder="Small Title"
                                            value="{{ old('stitle_2', $Difference->stitle_2) }}" required>
                                        <div class="invalid-feedback">
                                            Please enter small title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Main Title</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="mtitle_2"
                                            placeholder="Main Title"
                                            value="{{ old('mtitle_2', $Difference->mtitle_2) }}" required>
                                        <div class="invalid-feedback">
                                            Please enter main title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Description
                                        </label>
                                        <textarea name="description_2" rows="5" class="form-control"
                                            placeholder="Description"
                                            required>{{ old('description_2', $Difference->description_2) }}</textarea>
                                        <div class="invalid-feedback">
                                            Please enter description.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom05">Image</label>
                                        <input type="file" class="form-control" id="validationCustom05" name="image_2"
                                            placeholder="Image" @if(empty($Difference->image_2)) required @endif>
                                        <div class="invalid-feedback">
                                            Please upload image.
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($Difference->image_2))
                                    <div class="row">
                                        <div class="mb-3">
                                            <img id="imgPreview" width="100px" height="100px"
                                                src="{{ asset('storage') }}/difference/{{ $Difference->image_2 }}" alt="pic" />
                                        </div>
                                    </div>
                                @endif  

                                @php
                                    $sections2 = $id != "" ? json_decode($Difference->points_2) : [];
                                    $oldCount2 = count($sections2);
                                @endphp
                                <div class="row">
                                    <div class="mb-3" id="clone-container2">
                                        @if($oldCount2 != 0)
                                            @for ($j = 0; $j < $oldCount2; $j++)
                                                <div class="row cloneable-sec2">
                                                    <div class="form-group col-xl-10">
                                                        <label for="title">Points</label>
                                                        <input type="text" name="points_sec2[]" class="form-control"
                                                            value="{{ $sections2[$j]}}" required>
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