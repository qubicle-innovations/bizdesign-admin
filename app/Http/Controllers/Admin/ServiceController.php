<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceMain;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\ServiceFirstSection;
use App\Models\ServiceSecondSection;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $cnt = ServiceMain::count();
        if ($request->ajax()) {
            $data = ServiceMain::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url_profile1 = url('admin/service/category/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_profile1 . ' class="btn btn-info"><i class="bx bxs-edit"></i></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('service_category.index', compact('cnt'));
    }


    public function create()
    {
        $ServiceMain = new ServiceMain();
        $id = "";
        $action_url = url('admin/service/category/create');
        return view('service_category.form', compact('id', 'ServiceMain', 'action_url'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'stitle' => 'required',
                'mtitle' => 'required',
                'description' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/service/details/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $ServiceMain = new ServiceMain();
        $ServiceMain->stitle = $request->stitle;
        $ServiceMain->mtitle = $request->mtitle;
        $ServiceMain->description = $request->description;
        $ServiceMain->save();

        return redirect('admin/service/details');
    }

    public function edit($id)
    {
        $ServiceMain = ServiceMain::find($id);
        $action_url = url('admin/service/details/update/' . $id);
        return view('service_category.form', compact('id', 'ServiceMain', 'action_url'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'stitle' => 'required',
                'mtitle' => 'required',
                'description' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/service/details/update/' . $id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $ServiceMain = ServiceMain::find($id);
        $ServiceMain->stitle = $request->stitle;
        $ServiceMain->mtitle = $request->mtitle;
        $ServiceMain->description = $request->description;
        $ServiceMain->save();
        return redirect('admin/service/details');
    }
    public function list_category(Request $request)
    {
        $cnt = ServiceCategory::count();
        if ($request->ajax()) {
            $data = ServiceCategory::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url_profile1 = url('admin/service/category/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_profile1 . ' class="btn btn-info"><i class="bx bxs-edit"></i></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a onclick="delete_record(' . $row->id . ')" href="#" class="btn btn-danger"><i class="bx bxs-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('service_category.index', compact('cnt'));
    }


    public function create_category()
    {
        $ServiceCategory = new ServiceCategory();
        $id = "";
        $action_url = url('admin/service/category/create');
        return view('service_category.form', compact('id', 'ServiceCategory', 'action_url'));
    }

    public function store_category(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/service/category/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $ServiceCategory = new ServiceCategory();
        $ServiceCategory->name = $request->name;
        $ServiceCategory->save();

        return redirect('admin/service/category');
    }

    public function edit_category($id)
    {
        $ServiceCategory = ServiceCategory::find($id);
        $action_url = url('admin/service/category/update/' . $id);
        return view('service_category.form', compact('id', 'ServiceCategory', 'action_url'));
    }

    public function update_category(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/service/category/update/' . $id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $ServiceCategory = ServiceCategory::find($id);
        $ServiceCategory->name = $request->name;
        $ServiceCategory->save();
        return redirect('admin/service/category');
    }
    public function destroy_categor(string $id)
    {
        $resource = ServiceCategory::findOrFail($id);
        $resource->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }


    public function list_service(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function ($row) {
                    $imagePath = 'service/' . $row->logo;
                    $iimg = asset("storage/{$imagePath}");
                    $img = '<div class="img_div"><img src="' . $iimg . '" alt="image" class="img-fluid rounded me-3"></div>';

                    return $img;
                })
                ->addColumn('action', function ($row) {
                    $url_profile1 = url('admin/service/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_profile1 . ' class="btn btn-info"><i class="bx bxs-edit"></i></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a onclick="delete_record(' . $row->id . ')" href="#" class="btn btn-danger"><i class="bx bxs-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'img'])
                ->make(true);
        }
        return view('service.index');
    }

    public function create_service()
    {
        $Service = new Service();
        $ServiceCategory = ServiceCategory::get();
        $id = "";
        $action_url = url('admin/service/create');
        return view('service.form', compact('id', 'Service','ServiceCategory', 'action_url'));
    }

    public function store_service(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'logo' => 'required|mimes:jpg,png,jpeg,gif,svg',
                'description' => 'required',
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
            return redirect('admin/service/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Service = new Service();
        $Service->category_id = $request->category_id;
        $Service->title = $request->title;
        $Service->description = $request->description;
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/service/', $imageName);
            $Service->logo = $imageName;
        }
        $Service->stitle_sub1 = $request->stitle_sub1;
        $Service->mtitle_sub1 = $request->mtitle_sub1;
        $Service->title_sub2 = $request->title_sub2;
        $Service->description_sub2 = $request->description_sub2;
        $Service->description2_sub2 = $request->description2_sub2;
        if ($request->hasfile('image_sub2')) {
            $file1 = $request->file('image_sub2');
            $imageName2 = time() . '1.' . $file1->extension();
            $file1->storeAs('public/service/', $imageName2);
            $Service->image_sub2 = $imageName2;
        }
        $Service->points_sub2 = $request->points_sec2 && count($request->points_sec2) > 0 ? json_encode($request->points_sec2) : [];

        $Service->save();

        $title_subsec1 = $request->title_subsec1;
        $description_subsec1 = $request->description_subsec1;
        for ($i = 0; $i < count($title_subsec1); $i++) {
            if (!empty($title_subsec1[$i]) || !empty($description_subsec1[$i])) {
                $ServiceFirstSection = new ServiceFirstSection();
                $ServiceFirstSection->service_id = $Service->id;
                $ServiceFirstSection->title = !empty($title_subsec1[$i]) ? $title_subsec1[$i] : null;
                $ServiceFirstSection->description = !empty($description_subsec1[$i]) ? $description_subsec1[$i] : null;
                if ($request->hasfile('image_subsec1.' . $i)) {
                    $file = $request->file('image_subsec1.' . $i);
                    $imageName3 = time() . $i . '.' . $file->extension();
                    $file->storeAs('public/service/section1/', $imageName3);
                    $ServiceFirstSection->image = $imageName3;
                }
                $ServiceFirstSection->save();
            }
        }
        return redirect('admin/service/section3/' . $Service->id);
    }

    
    public function edit_service($id)
    {
        $Service = Service::with('section1')->find($id);
        $ServiceCategory = ServiceCategory::get();
        $action_url = url('admin/service/update/' . $id);
        return view('service.form', compact('id', 'Service','ServiceCategory', 'action_url'));
    }

    public function update_service(Request $request, $id)
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
            return redirect('admin/service/update/' . $id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Service = Service::find($id);
        $Service->title = $request->title;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/service/', $imageName);
            $Service->image = $imageName;
        }
        $Service->stitle_sub1 = $request->stitle_sub1;
        $Service->mtitle_sub1 = $request->mtitle_sub1;
        $Service->title_sub2 = $request->title_sub2;
        $Service->description_sub2 = $request->description_sub2;
        $Service->description2_sub2 = $request->description2_sub2;
        if ($request->hasfile('image_sub2')) {
            $file1 = $request->file('image_sub2');
            $imageName2 = time() . '1.' . $file1->extension();
            $file1->storeAs('public/service/', $imageName2);
            $Service->image_sub2 = $imageName2;
        }
        $Service->points_sub2 = $request->points_sec2 && count($request->points_sec2) > 0 ? json_encode($request->points_sec2) : [];

        $Service->save();

        ServiceFirstSection::where('service_id', $id)->delete();
        $title_subsec1 = $request->title_subsec1;
        $description_subsec1 = $request->description_subsec1;
        $edit_img1 = $request->edit_img1;
        for ($i = 0; $i < count($title_subsec1); $i++) {
            if (!empty($title_subsec1[$i]) || !empty($description_subsec1[$i])) {
                $ServiceFirstSection = new ServiceFirstSection();
                $ServiceFirstSection->service_id = $id;
                $ServiceFirstSection->title = !empty($title_subsec1[$i]) ? $title_subsec1[$i] : null;
                $ServiceFirstSection->description = !empty($description_subsec1[$i]) ? $description_subsec1[$i] : null;
                if ($request->hasfile('image_subsec1.' . $i)) {
                    $file = $request->file('image_subsec1.' . $i);
                    $imageName3 = time() . $i . '.' . $file->extension();
                    $file->storeAs('public/service/section1/', $imageName3);
                    $ServiceFirstSection->image = $imageName3;
                } else {
                    $ServiceFirstSection->image = $edit_img1[$i];
                }
                $ServiceFirstSection->save();
            }
        }

        return redirect('admin/service/section3/' . $id);
    }



    public function form_section3($id)
    {
        $Service = Service::with('section2')->find($id);
        $action_url = url('admin/service/section3/' . $id);
        return view('service.section3_form', compact('id', 'Service', 'action_url'));
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
            return redirect('admin/service/section3/' . $request->service_id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Service = Service::find($request->service_id);
        $Service->title_sub3 = $request->title_sub3;
        $Service->description_sub3 = $request->description_sub3;
        if ($request->hasfile('image_sub3')) {
            $file = $request->file('image_sub3');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/service/', $imageName);
            $Service->image_sub3 = $imageName;
        }

        ServiceSecondSection::where('service_id', $request->service_id)->delete();
        foreach ($request->title_subsec1 as $index => $title) {
            // Create a new main section
            $ServiceSecondSection = new ServiceSecondSection();
            $ServiceSecondSection->service_id = $request->service_id;
            $ServiceSecondSection->title = $title;

            // Iterate over each corresponding points_sec2 and save the sub-sections
            $ServiceSecondSection->points = $request->points_sec2[$index] && count($request->points_sec2[$index]) > 0 ? json_encode($request->points_sec2[$index]) : [];
            $ServiceSecondSection->save();
        }

        $Service->save();

        return redirect('admin/service');
    }

    public function destroy(string $id)
    {
        $resource = Service::findOrFail($id);
        $resource->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
