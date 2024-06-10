<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('banner', function ($row) {
                    $imagePath = 'banners/' . $row->image;
                    $iimg = asset("storage/{$imagePath}");
                    $banner = '<div class="img_div"><img src="' . $iimg . '" alt="image" class="img-fluid rounded me-3"></div>';

                    return $banner;
                })
                ->addColumn('action', function ($row) {
                    $url_ig = url('admin/banner/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_ig . ' class="btn btn-info"><i class="bx bxs-edit"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a onclick="delete_record(' . $row->id . ')" href="#" class="btn btn-danger"><i class="bx bxs-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'banner'])
                ->make(true);
        }
        return view('banner.index');
    }

    public function create()
    {
        $Banner = new Banner();
        $id = "";
        $action_url = url('admin/banner/create');
        return view('banner.form', compact('id', 'Banner', 'action_url'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'images' => 'required',
                'images.*' => 'mimes:jpg,png,jpeg,gif,svg',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/banner/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $imageName = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('public/banners', $imageName);
                $Banner = new Banner();
                $Banner->image = $imageName;
                $Banner->save();
            }
        }
        return redirect('admin/banner');
    }

    public function edit(string $id)
    {
        $Banner = Banner::find($id);
        $action_url = url('admin/banner/update/' . $id);
        return view('banner.form', compact('id', 'Banner', 'action_url'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'mimes:jpg,png,jpeg,gif,svg',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/banner/update/'.$id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Banner = Banner::find($id);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/banners/', $imageName);
            $Banner->image = $imageName;
        }
        $Banner->save();
        return redirect('admin/banner');
    }

    public function destroy(string $id)
    {
        $resource = Banner::findOrFail($id);
        $resource->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
