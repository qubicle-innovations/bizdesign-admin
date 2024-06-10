<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business_Setup;
use App\Models\Business_Category;
use App\Models\Business_Firstsection;
use App\Models\Business_Secondsection;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class BusinessController extends Controller
{
    public function index(Request $request)
    {
        $cnt = Business_Setup::count();
        if ($request->ajax()) {
            $data = Business_Setup::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url_profile1 = url('admin/business/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_profile1 . ' class="btn btn-info"><i class="bx bxs-edit"></i></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('business_detail.index', compact('cnt'));
    }

    public function create()
    {
        $Business_Setup = new Business_Setup();
        $id = "";
        $action_url = url('admin/business/create');
        return view('business_detail.form', compact('id', 'Business_Setup', 'action_url'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'stitle' => 'required',
                'mtitle' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/business/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Business_Setup = new Business_Setup();
        $Business_Setup->stitle = $request->stitle;
        $Business_Setup->mtitle = $request->mtitle;
        $Business_Setup->save();

        return redirect('admin/business');
    }

    public function edit($id)
    {
        $Business_Setup = Business_Setup::find($id);
        $action_url = url('admin/business/update/' . $id);
        return view('business_detail.form', compact('id', 'Business_Setup', 'action_url'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'stitle' => 'required',
                'mtitle' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/business/update/' . $id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Business_Setup = Business_Setup::find($id);
        $Business_Setup->stitle = $request->stitle;
        $Business_Setup->mtitle = $request->mtitle;
        $Business_Setup->save();
        return redirect('admin/business');
    }


    public function list_category(Request $request)
    {
        if ($request->ajax()) {
            $data = Business_Category::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function ($row) {
                    $imagePath = 'business/' . $row->image;
                    $iimg = asset("storage/{$imagePath}");
                    $img = '<div class="img_div"><img src="' . $iimg . '" alt="image" class="img-fluid rounded me-3"></div>';

                    return $img;
                })
                ->addColumn('action', function ($row) {
                    $url_profile1 = url('admin/business/category/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_profile1 . ' class="btn btn-info"><i class="bx bxs-edit"></i></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a onclick="delete_record(' . $row->id . ')" href="#" class="btn btn-danger"><i class="bx bxs-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'img'])
                ->make(true);
        }
        return view('business_category.index');
    }


    public function create_category()
    {
        $Business_Category = new Business_Category();
        $id = "";
        $action_url = url('admin/business/category/create');
        return view('business_category.form', compact('id', 'Business_Category', 'action_url'));
    }

    public function store_category(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'image' => 'required|mimes:jpg,png,jpeg,gif,svg',
                'stitle_sub1' => 'required',
                'mtitle_sub1' => 'required',
                'title_subsec1.*' => 'required',
                'description_subsec1.*' => 'required',
                'image_subsec1.*' => 'required|mimes:jpg,png,jpeg,gif,svg',
                'title_sub2' => 'required',
                'description_sub2' => 'required',
                'description2_sub2' => 'required',
                'image_sub2' => 'required|mimes:jpg,png,jpeg,gif,svg',
                'points_sec2.*' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/business/category/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Business_Category = new Business_Category();
        $Business_Category->title = $request->title;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/business/', $imageName);
            $Business_Category->image = $imageName;
        }
        $Business_Category->stitle_sub1 = $request->stitle_sub1;
        $Business_Category->mtitle_sub1 = $request->mtitle_sub1;
        $Business_Category->title_sub2 = $request->title_sub2;
        $Business_Category->description_sub2 = $request->description_sub2;
        $Business_Category->description2_sub2 = $request->description2_sub2;
        if ($request->hasfile('image_sub2')) {
            $file1 = $request->file('image_sub2');
            $imageName2 = time() . '1.' . $file1->extension();
            $file1->storeAs('public/business/', $imageName2);
            $Business_Category->image_sub2 = $imageName2;
        }
        $Business_Category->points_sub2 = $request->points_sec2 && count($request->points_sec2) > 0 ? json_encode($request->points_sec2) : [];

        $Business_Category->save();

        $title_subsec1 = $request->title_subsec1;
        $description_subsec1 = $request->description_subsec1;
        for ($i = 0; $i < count($title_subsec1); $i++) {
            if (!empty($title_subsec1[$i]) || !empty($description_subsec1[$i])) {
                $Business_Firstsection = new Business_Firstsection();
                $Business_Firstsection->business_id = $Business_Category->id;
                $Business_Firstsection->title = !empty($title_subsec1[$i]) ? $title_subsec1[$i] : null;
                $Business_Firstsection->description = !empty($description_subsec1[$i]) ? $description_subsec1[$i] : null;
                if ($request->hasfile('image_subsec1.' . $i)) {
                    $file = $request->file('image_subsec1.' . $i);
                    $imageName3 = time() . $i . '.' . $file->extension();
                    $file->storeAs('public/business/section1/', $imageName3);
                    $Business_Firstsection->image = $imageName3;
                }
                $Business_Firstsection->save();
            }
        }
        return redirect('admin/business/category/section3/' . $Business_Category->id);
    }

    public function edit_category($id)
    {
        $Business_Category = Business_Category::with('section1')->find($id);
        $action_url = url('admin/business/category/update/' . $id);
        return view('business_category.form', compact('id', 'Business_Category', 'action_url'));
    }

    public function update_category(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'image' => 'mimes:jpg,png,jpeg,gif,svg',
                'stitle_sub1' => 'required',
                'mtitle_sub1' => 'required',
                'title_subsec1.*' => 'required',
                'description_subsec1.*' => 'required',
                'image_subsec1.*' => 'mimes:jpg,png,jpeg,gif,svg',
                'title_sub2' => 'required',
                'description_sub2' => 'required',
                'description2_sub2' => 'required',
                'image_sub2' => 'mimes:jpg,png,jpeg,gif,svg',
                'points_sec2.*' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/business/category/update/' . $id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Business_Category = Business_Category::find($id);
        $Business_Category->title = $request->title;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/business/', $imageName);
            $Business_Category->image = $imageName;
        }
        $Business_Category->stitle_sub1 = $request->stitle_sub1;
        $Business_Category->mtitle_sub1 = $request->mtitle_sub1;
        $Business_Category->title_sub2 = $request->title_sub2;
        $Business_Category->description_sub2 = $request->description_sub2;
        $Business_Category->description2_sub2 = $request->description2_sub2;
        if ($request->hasfile('image_sub2')) {
            $file1 = $request->file('image_sub2');
            $imageName2 = time() . '1.' . $file1->extension();
            $file1->storeAs('public/business/', $imageName2);
            $Business_Category->image_sub2 = $imageName2;
        }
        $Business_Category->points_sub2 = $request->points_sec2 && count($request->points_sec2) > 0 ? json_encode($request->points_sec2) : [];

        $Business_Category->save();

        Business_Firstsection::where('business_id', $id)->delete();
        $title_subsec1 = $request->title_subsec1;
        $description_subsec1 = $request->description_subsec1;
        $edit_img1 = $request->edit_img1;
        for ($i = 0; $i < count($title_subsec1); $i++) {
            if (!empty($title_subsec1[$i]) || !empty($description_subsec1[$i])) {
                $Business_Firstsection = new Business_Firstsection();
                $Business_Firstsection->business_id = $id;
                $Business_Firstsection->title = !empty($title_subsec1[$i]) ? $title_subsec1[$i] : null;
                $Business_Firstsection->description = !empty($description_subsec1[$i]) ? $description_subsec1[$i] : null;
                if ($request->hasfile('image_subsec1.' . $i)) {
                    $file = $request->file('image_subsec1.' . $i);
                    $imageName3 = time() . $i . '.' . $file->extension();
                    $file->storeAs('public/business/section1/', $imageName3);
                    $Business_Firstsection->image = $imageName3;
                } else {
                    $Business_Firstsection->image = $edit_img1[$i];
                }
                $Business_Firstsection->save();
            }
        }

        return redirect('admin/business/category/section3/' . $id);
    }


    public function form_section3($id)
    {
        $Business_Category = Business_Category::with('section2')->find($id);
        $action_url = url('admin/business/category/section3/' . $id);
        return view('business_category.section3_form', compact('id', 'Business_Category', 'action_url'));
    }

    public function update_section3(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title_sub3' => 'required',
                'description_sub3' => 'required',
                'image_sub3' => 'mimes:jpg,png,jpeg,gif,svg',
                'title_subsec1.*' => 'required',
                'points_sec2.*' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/business/category/section3/' . $request->category_id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Business_Category = Business_Category::find($request->category_id);
        $Business_Category->title_sub3 = $request->title_sub3;
        $Business_Category->description_sub3 = $request->description_sub3;
        if ($request->hasfile('image_sub3')) {
            $file = $request->file('image_sub3');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/business/', $imageName);
            $Business_Category->image_sub3 = $imageName;
        }

        Business_Secondsection::where('business_id', $request->category_id)->delete();
        foreach ($request->title_subsec1 as $index => $title) {
            // Create a new main section
            $Business_Secondsection = new Business_Secondsection();
            $Business_Secondsection->business_id = $request->category_id;
            $Business_Secondsection->title = $title;

            // Iterate over each corresponding points_sec2 and save the sub-sections
            $Business_Secondsection->points = $request->points_sec2[$index] && count($request->points_sec2[$index]) > 0 ? json_encode($request->points_sec2[$index]) : [];
            $Business_Secondsection->save();
        }

        $Business_Category->save();

        return redirect('admin/business/category');
    }

    public function destroy(string $id)
    {
        $resource = Business_Category::findOrFail($id);
        $resource->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
