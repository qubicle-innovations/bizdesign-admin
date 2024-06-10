<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnquiryManagement;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SocialMediaController extends Controller
{

    public function index(Request $request)
    {
        $cnt = SocialMedia::count();
        if ($request->ajax()) {
            $data = SocialMedia::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url_profile1 = url('admin/socialmedia/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_profile1 . ' class="btn btn-info"><i class="bx bxs-edit"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('socialmedia.index', compact('cnt'));
    }

    public function create()
    {
        $SocialMedia = new SocialMedia();
        $id = "";
        $action_url = url('admin/socialmedia/create');
        return view('socialmedia.form', compact('id', 'SocialMedia', 'action_url'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'facebook' => 'required',
                'instagram' => 'required',
                'twitter' => 'required',
                'snapchat' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/socialmedia/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $SocialMedia = new SocialMedia();
        $SocialMedia->facebook = $request->facebook;
        $SocialMedia->instagram = $request->instagram;
        $SocialMedia->twitter = $request->twitter;
        $SocialMedia->snapchat = $request->snapchat;
        $SocialMedia->save();
        return redirect('admin/socialmedia');
    }

    public function edit($id)
    {
        $SocialMedia = SocialMedia::find($id);
        $action_url = url('admin/socialmedia/update/' . $id);
        return view('socialmedia.form', compact('id', 'SocialMedia', 'action_url'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'facebook' => 'required',
                'instagram' => 'required',
                'twitter' => 'required',
                'snapchat' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/socialmedia/update/' . $id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $SocialMedia = SocialMedia::find($id);
        $SocialMedia->facebook = $request->facebook;
        $SocialMedia->instagram = $request->instagram;
        $SocialMedia->twitter = $request->twitter;
        $SocialMedia->snapchat = $request->snapchat;
        $SocialMedia->save();
        return redirect('admin/socialmedia');
    }
}
