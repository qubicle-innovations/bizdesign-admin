<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonials;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class TestimonialsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Testimonials::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('testi_name', function ($row) {
                    $imagePath = 'testimonials/' . $row->image;
                    $propic = asset("storage/{$imagePath}");
                    $testi_name = '<div class="img_div"><img src="' . $propic . '" alt="image" class="img-fluid avatar-md rounded me-3">' . $row->name . '</div>';

                    return $testi_name;
                })
                ->addColumn('action', function ($row) {
                    $url_profile1 = url('admin/testimonials/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_profile1 . ' class="btn btn-info"><i class="bx bxs-edit"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a onclick="delete_record(' . $row->id . ')" href="#" class="btn btn-danger"><i class="bx bxs-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'testi_name'])
                ->make(true);
        }
        return view('testimonials.index');
    }

    public function create()
    {
        $Testimonials = new Testimonials();
        $id = "";
        $action_url = url('admin/testimonials/create');
        return view('testimonials.form', compact('id', 'Testimonials', 'action_url'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'name' => 'required',
                'company_name' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpg,png,jpeg,gif,svg',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/testimonials/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Testimonials = new Testimonials();
        $Testimonials->name = $request->name;
        $Testimonials->company_name = $request->company_name;
        $Testimonials->description = $request->description;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/testimonials/', $imageName);
            $Testimonials->image = $imageName;
        }
        $Testimonials->save();
        return redirect('admin/testimonials');
    }

    public function edit($id)
    {
        $Testimonials = Testimonials::find($id);
        $action_url = url('admin/testimonials/update/' . $id);
        return view('testimonials.form', compact('id', 'Testimonials', 'action_url'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'name' => 'required',
                'company_name' => 'required',
                'description' => 'required',
                'image' => 'mimes:jpg,png,jpeg,gif,svg',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/testimonials/update/' . $id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Testimonials = Testimonials::find($id);
        $Testimonials->name = $request->name;
        $Testimonials->company_name = $request->company_name;
        $Testimonials->description = $request->description;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/testimonials/', $imageName);
            $Testimonials->image = $imageName;
        }
        $Testimonials->save();
        return redirect('admin/testimonials');
    }


    public function destroy(string $id)
    {
        $resource = Testimonials::findOrFail($id);
        $resource->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
