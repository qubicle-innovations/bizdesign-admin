<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Difference;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class DifferenceController extends Controller
{
    public function index(Request $request)
    {
        $cnt = Difference::count();
        if ($request->ajax()) {
            $data = Difference::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url_profile1 = url('admin/difference/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_profile1 . ' class="btn btn-info"><i class="bx bxs-edit"></i></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('difference.index', compact('cnt'));
    }

    public function create()
    {
        $Difference = new Difference();
        $id = "";
        $action_url = url('admin/difference/create');
        return view('difference.form', compact('id', 'Difference', 'action_url'));
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
                'points_sec1.*' => 'required',
                'stitle_2' => 'required',
                'mtitle_2' => 'required',
                'description_2' => 'required',
                'image_2' => 'required|mimes:jpg,png,jpeg,gif,svg',
                'points_sec2.*' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/expertise/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Difference = new Difference();
        $Difference->stitle_1 = $request->stitle_1;
        $Difference->mtitle_1 = $request->mtitle_1;
        $Difference->description_1 = $request->description_1;
        if ($request->hasfile('image_1')) {
            $file = $request->file('image_1');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/difference/', $imageName);
            $Difference->image_1 = $imageName;
        }
        $Difference->stitle_2 = $request->stitle_2;
        $Difference->mtitle_2 = $request->mtitle_2;
        $Difference->description_2 = $request->description_2;
        if ($request->hasfile('image_2')) {
            $file = $request->file('image_2');
            $imageName2 = time() . '.' . $file->extension();
            $file->storeAs('public/difference/', $imageName2);
            $Difference->image_2 = $imageName2;
        }
        $Difference->points_1 = $request->points_sec1 && count($request->points_sec1) > 0 ? json_encode($request->points_sec1) : [];
        $Difference->points_2 = $request->points_sec2 && count($request->points_sec2) > 0 ? json_encode($request->points_sec2) : [];
        $Difference->save();

        return redirect('admin/difference');
    }

    public function edit($id)
    {
        $Difference = Difference::find($id);
        $action_url = url('admin/difference/update/' . $id);
        return view('difference.form', compact('id', 'Difference', 'action_url'));
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
                'points_sec1.*' => 'required',
                'stitle_2' => 'required',
                'mtitle_2' => 'required',
                'description_2' => 'required',
                'image_2' => 'mimes:jpg,png,jpeg,gif,svg',
                'points_sec2.*' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/difference/update/'.$id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Difference = Difference::find($id);
        $Difference->stitle_1 = $request->stitle_1;
        $Difference->mtitle_1 = $request->mtitle_1;
        $Difference->description_1 = $request->description_1;
        if ($request->hasfile('image_1')) {
            $file = $request->file('image_1');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/difference/', $imageName);
            $Difference->image_1 = $imageName;
        }
        $Difference->stitle_2 = $request->stitle_2;
        $Difference->mtitle_2 = $request->mtitle_2;
        $Difference->description_2 = $request->description_2;
        if ($request->hasfile('image_2')) {
            $file = $request->file('image_2');
            $imageName2 = time() . '.' . $file->extension();
            $file->storeAs('public/difference/', $imageName2);
            $Difference->image_2 = $imageName2;
        }
        $Difference->points_1 = $request->points_sec1 && count($request->points_sec1) > 0 ? json_encode($request->points_sec1) : [];
        $Difference->points_2 = $request->points_sec2 && count($request->points_sec2) > 0 ? json_encode($request->points_sec2) : [];
        $Difference->save();
        return redirect('admin/difference');
    }
}
