<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AboutusController extends Controller
{
    public function index(Request $request)
    {
       $cnt= Aboutus::count();
        if ($request->ajax()) {
            $data = Aboutus::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url_profile1 = url('admin/aboutus/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_profile1 . ' class="btn btn-info"><i class="bx bxs-edit"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('aboutus.index', compact('cnt'));
    }

    public function create()
    {
        $Aboutus = new Aboutus();
        $id = "";
        $action_url = url('admin/aboutus/create');
        return view('aboutus.form', compact('id', 'Aboutus', 'action_url'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'stitle_1' => 'required',
                'mtitle_1' => 'required',
                'description_1' => 'required',
                'image_1' => 'required|mimes:jpg,png,jpeg,gif,svg',
                'stitle_2' => 'required',
                'mtitle_2' => 'required',
                'description_2' => 'required',
                'image_2' => 'required|mimes:jpg,png,jpeg,gif,svg',
                'stitle_3' => 'required',
                'mtitle_3' => 'required',
                'description_3' => 'required',
                'image_3' => 'required|mimes:jpg,png,jpeg,gif,svg',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/aboutus/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Aboutus = new Aboutus();
        $Aboutus->stitle_1 = $request->stitle_1;
        $Aboutus->mtitle_1 = $request->mtitle_1;
        $Aboutus->description_1 = $request->description_1;
        if ($request->hasfile('image_1')) {
            $file = $request->file('image_1');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/aboutus/', $imageName);
            $Aboutus->image_1 = $imageName;
        }
        $Aboutus->stitle_2 = $request->stitle_2;
        $Aboutus->mtitle_2 = $request->mtitle_2;
        $Aboutus->description_2 = $request->description_2;
        if ($request->hasfile('image_2')) {
            $file = $request->file('image_2');
            $imageName2 = time() . '.' . $file->extension();
            $file->storeAs('public/aboutus/', $imageName2);
            $Aboutus->image_2 = $imageName2;
        }
        $Aboutus->stitle_3 = $request->stitle_3;
        $Aboutus->mtitle_3 = $request->mtitle_3;
        $Aboutus->description_3 = $request->description_3;
        if ($request->hasfile('image_3')) {
            $file = $request->file('image_3');
            $imageName3 = time() . '.' . $file->extension();
            $file->storeAs('public/aboutus/', $imageName3);
            $Aboutus->image_3 = $imageName3;
        }
        $Aboutus->save();
        return redirect('admin/aboutus');
    }

    public function edit($id)
    {
        $Aboutus = Aboutus::find($id);
        $action_url = url('admin/aboutus/update/' . $id);
        return view('aboutus.form', compact('id', 'Aboutus', 'action_url'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'stitle_1' => 'required',
                'mtitle_1' => 'required',
                'description_1' => 'required',
                'image_1' => 'mimes:jpg,png,jpeg,gif,svg',
                'stitle_2' => 'required',
                'mtitle_2' => 'required',
                'description_2' => 'required',
                'image_2' => 'mimes:jpg,png,jpeg,gif,svg',
                'stitle_3' => 'required',
                'mtitle_3' => 'required',
                'description_3' => 'required',
                'image_3' => 'mimes:jpg,png,jpeg,gif,svg',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/aboutus/update/'.$id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Aboutus = Aboutus::find($id);
        $Aboutus->stitle_1 = $request->stitle_1;
        $Aboutus->mtitle_1 = $request->mtitle_1;
        $Aboutus->description_1 = $request->description_1;
        if ($request->hasfile('image_1')) {
            $file = $request->file('image_1');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/aboutus/', $imageName);
            $Aboutus->image_1 = $imageName;
        }
        $Aboutus->stitle_2 = $request->stitle_2;
        $Aboutus->mtitle_2 = $request->mtitle_2;
        $Aboutus->description_2 = $request->description_2;
        if ($request->hasfile('image_2')) {
            $file = $request->file('image_2');
            $imageName2 = time() . '.' . $file->extension();
            $file->storeAs('public/aboutus/', $imageName2);
            $Aboutus->image_2 = $imageName2;
        }
        $Aboutus->stitle_3 = $request->stitle_3;
        $Aboutus->mtitle_3 = $request->mtitle_3;
        $Aboutus->description_3 = $request->description_3;
        if ($request->hasfile('image_3')) {
            $file = $request->file('image_3');
            $imageName3 = time() . '.' . $file->extension();
            $file->storeAs('public/aboutus/', $imageName3);
            $Aboutus->image_3 = $imageName3;
        }
        $Aboutus->save();
        return redirect('admin/aboutus');
    }
}
