<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnquiryManagement;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class EnquiryManagementController extends Controller
{

    public function index(Request $request)
    {
        $cnt = EnquiryManagement::count();
        if ($request->ajax()) {
            $data = EnquiryManagement::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('enq_img', function ($row) {
                    $imagePath = 'enquiry/' . $row->image;
                    $iimg = asset("storage/{$imagePath}");
                    $enq_img = '<div class="img_div"><img src="' . $iimg . '" alt="image" class="img-fluid rounded me-3"></div>';

                    return $enq_img;
                })
                ->addColumn('action', function ($row) {
                    $url_profile1 = url('admin/enquiry/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_profile1 . ' class="btn btn-info"><i class="bx bxs-edit"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'enq_img'])
                ->make(true);
        }
        return view('enquiry.index', compact('cnt'));
    }

    public function create()
    {
        $Enquiry = new EnquiryManagement();
        $id = "";
        $action_url = url('admin/enquiry/create');
        return view('enquiry.form', compact('id', 'Enquiry', 'action_url'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'stitle' => 'required',
                'mtitle' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpg,png,jpeg,gif,svg',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/enquiry/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Enquiry = new EnquiryManagement();
        $Enquiry->stitle = $request->stitle;
        $Enquiry->mtitle = $request->mtitle;
        $Enquiry->description = $request->description;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/enquiry/', $imageName);
            $Enquiry->image = $imageName;
        }
        $Enquiry->save();
        return redirect('admin/enquiry');
    }

    public function edit($id)
    {
        $Enquiry = EnquiryManagement::find($id);
        $action_url = url('admin/enquiry/update/' . $id);
        return view('enquiry.form', compact('id', 'Enquiry', 'action_url'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'stitle' => 'required',
                'mtitle' => 'required',
                'description' => 'required',
                'image' => 'mimes:jpg,png,jpeg,gif,svg',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/enquiry/update/' . $id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Enquiry = EnquiryManagement::find($id);
        $Enquiry->stitle = $request->stitle;
        $Enquiry->mtitle = $request->mtitle;
        $Enquiry->description = $request->description;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/enquiry/', $imageName);
            $Enquiry->image = $imageName;
        }
        $Enquiry->save();
        return redirect('admin/enquiry');
    }
}
