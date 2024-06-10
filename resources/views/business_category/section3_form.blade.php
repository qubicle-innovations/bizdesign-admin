@extends('layouts.master')
@section('title')
Business Category
@endsection
@section('page-title')
Business Category
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Business Category
                        <a href="{{ url('admin/business/category/update/' . $Business_Category->id) }}" type="button"
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
                                <h5 class="card-title">Section 3</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Title</label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            name="title_sub3" placeholder="Title"
                                            value="{{ old('title_sub3', $Business_Category->title_sub3) }}" required>
                                        <input type="hidden" class="form-control" name="category_id"
                                            value="{{ $Business_Category->id }}">
                                        <div class="invalid-feedback">
                                            Please enter title.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Description
                                        </label>
                                        <textarea name="description_sub3" rows="5" class="form-control"
                                            placeholder="Description"
                                            required>{{ old('description_sub3', $Business_Category->description_sub3) }}</textarea>
                                        <div class="invalid-feedback">
                                            Please enter description.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom05">Image</label>
                                        <input type="file" class="form-control" id="validationCustom05"
                                            name="image_sub3" placeholder="Image"
                                            @if(empty($Business_Category->image_sub3)) required @endif>
                                        <div class="invalid-feedback">
                                            Please upload image.
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($Business_Category->image_sub3))
                                    <div class="row">
                                        <div class="mb-3">
                                            <img id="imgPreview" width="100px" height="100px"
                                                src="{{ asset('storage') }}/business/{{ $Business_Category->image_sub3 }}"
                                                alt="pic" />
                                        </div>
                                    </div>
                                @endif                                  
                                @php
    $sections1 = $id != "" ? $Business_Category->section2 : [];
    $oldCount = count($sections1);
@endphp
<div class="card">
    <div class="card-body">
        <div class="mb-3" id="clone-container">
        <input type="hidden" class="form-control fieldsetCount" value={{$oldCount>0?$oldCount-1:0}}>
            @if($oldCount != 0)
                @for ($i = 0; $i < $oldCount; $i++)
                    <div class="row cloneable-fieldset">
                        <div class="col-xl-5">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title_subsec1[]"
                                    value="{{ $sections1[$i]['title'] }}" class="form-control" required>
                                <div class="invalid-feedback">Please enter title.</div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    @php
                                        $sections2 = json_decode($sections1[$i]['points'], true);
                                        $oldCount2 = count($sections2);
                                    @endphp
                                    @for ($j = 0; $j < $oldCount2; $j++)
                                        <div class="row cloneable-subsec_1">
                                            <div class="form-group col-xl-10">
                                                <label for="title">Points</label>
                                                <input type="text" name="points_sec2[{{ $i }}][]"
                                                    value="{{ $sections2[$j] }}" class="form-control" required>
                                                <div class="invalid-feedback">Please enter points.</div>
                                            </div>
                                            <div class="form-group col-xl-2 mt-4">
                                                <button type="button" class="btn btn-danger remove-sec2"><i class="bx bxs-trash"></i></button>
                                            </div>
                                        </div>
                                    @endfor
                                    <div class="form-group col-xl-12 mt-4">
                                        <button type="button" class="btn btn-success float-end add-submore"><i class='bx bx-plus'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-1 mt-4">
                            <button type="button" class="btn btn-danger remove-fieldset"><i class="bx bxs-trash"></i></button>
                        </div>
                        <hr class="mt-3">
                    </div>
                @endfor
            @else
                <div class="row cloneable-fieldset">
                    <div class="col-xl-5">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title_subsec1[]" class="form-control" required>
                            <div class="invalid-feedback">Please enter title.</div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row cloneable-subsec_1">
                                    <div class="form-group col-xl-10">
                                        <label for="title">Points</label>
                                        <input type="text" name="points_sec2[0][]" class="form-control" required>
                                        <div class="invalid-feedback">Please enter points.</div>
                                    </div>
                                    <div class="form-group col-xl-2 mt-4">
                                        <button type="button" class="btn btn-danger remove-sec2"><i class="bx bxs-trash"></i></button>
                                    </div>
                                </div>
                                <div class="form-group col-xl-12 mt-4">
                                    <button type="button" class="btn btn-success float-end add-submore"><i class='bx bx-plus'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-1 mt-4">
                        <button type="button" class="btn btn-danger remove-fieldset"><i class="bx bxs-trash"></i></button>
                    </div>
                    <hr class="mt-3">
                </div>
            @endif
        </div>
        <div class="form-group col-xl-12">
            <button type="button" id="add-more" class="btn btn-success float-end"><i class='bx bx-plus'></i></button>
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
            // Counter for cloneable-fieldset
            let fieldsetCount = $('.fieldsetCount').val();

            // Clone fieldset
            $('#add-more').click(function () {
                fieldsetCount++;
                let clone = $('.cloneable-fieldset:first').clone(true);
                clone.find('input').val('');

                // Update name attributes for points_sec2
                clone.find('.cloneable-subsec_1 input[name^="points_sec2"]').each(function () {
                    $(this).attr('name', 'points_sec2[' + fieldsetCount + '][]');
                });

                // Reset cloneable sub-sections to only the first one
                clone.find('.cloneable-subsec_1:gt(0)').remove();
                $('#clone-container').append(clone);
            });

            // Remove fieldset
            $(document).on('click', '.remove-fieldset', function () {
                $(this).closest('.cloneable-fieldset').remove();
            });

            // Clone sub-section
            $(document).on('click', '.add-submore', function () {
                let clone = $(this).closest('.card-body').find('.cloneable-subsec_1:first').clone(true);
                clone.find('input').val('');
                $(this).closest('.card-body').find('.cloneable-subsec_1:last').after(clone);
            });

            // Remove sub-section
            $(document).on('click', '.remove-sec2', function () {
                $(this).closest('.cloneable-subsec_1').remove();
            });
        });
    </script>
    @endsection