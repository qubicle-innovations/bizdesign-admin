<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expertise;
use App\Models\Expertise_Firstsection;
use App\Models\Expertise_Secondsection;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ExpertiseController extends Controller
{
    public function index(Request $request)
    {
        $cnt = Expertise::count();
        if ($request->ajax()) {
            $data = Expertise::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url_profile1 = url('admin/expertise/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_profile1 . ' class="btn btn-info"><i class="bx bxs-edit"></i></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('expertise.index', compact('cnt'));
    }

    public function create()
    {
        $Expertise = new Expertise();
        $id = "";
        $action_url = url('admin/expertise/create');
        return view('expertise.form', compact('id', 'Expertise', 'action_url'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'stitle_1' => 'required',
                'mtitle_1' => 'required',
                'stitle_2' => 'required',
                'mtitle_2' => 'required',
                'title_sec1.*' => 'required',
                'description_sec1.*' => 'required',
                'image_sec1.*' => 'required|mimes:jpg,png,jpeg,gif,svg',
                'title_sec2.*' => 'required',
                'image_sec2.*' => 'required|mimes:jpg,png,jpeg,gif,svg',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/expertise/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Expertise = new Expertise();
        $Expertise->stitle_1 = $request->stitle_1;
        $Expertise->mtitle_1 = $request->mtitle_1;
        $Expertise->stitle_2 = $request->stitle_2;
        $Expertise->mtitle_2 = $request->mtitle_2;
        $Expertise->save();

        $title_sec1 = $request->title_sec1;
        $description_sec1 = $request->description_sec1;
        for ($i = 0; $i < count($title_sec1); $i++) {
            if (!empty($title_sec1[$i]) || !empty($description_sec1[$i])) {
                $Expertise_Firstsection = new Expertise_Firstsection();
                $Expertise_Firstsection->expertise_id = $Expertise->id;
                $Expertise_Firstsection->title = !empty($title_sec1[$i]) ? $title_sec1[$i] : null;
                $Expertise_Firstsection->description = !empty($description_sec1[$i]) ? $description_sec1[$i] : null;
                if ($request->hasfile('image_sec1.' . $i)) {
                    $file = $request->file('image_sec1.' . $i);
                    $imageName = time() . '.' . $file->extension();
                    $file->storeAs('public/expertise/section1/', $imageName);
                    $Expertise_Firstsection->image = $imageName;
                }
                $Expertise_Firstsection->save();
            }
        }

        $title_sec2 = $request->title_sec2;
        for ($j = 0; $j < count($title_sec2); $j++) {
            if (!empty($title_sec2[$j])) {
                $Expertise_Secondsection = new Expertise_Secondsection();
                $Expertise_Secondsection->expertise_id = $Expertise->id;
                $Expertise_Secondsection->title = !empty($title_sec2[$j]) ? $title_sec2[$j] : null;
                if ($request->hasfile('image_sec2.' . $j)) {
                    $file = $request->file('image_sec2.' . $j);
                    $logoName = time() . '.' . $file->extension();
                    $file->storeAs('public/expertise/section2/', $logoName);
                    $Expertise_Secondsection->image = $logoName;
                }
                $Expertise_Secondsection->save();
            }
        }

        return redirect('admin/expertise');
    }

    public function edit($id)
    {
        $Expertise = Expertise::with('section1', 'section2')->find($id);
        $action_url = url('admin/expertise/update/' . $id);
        return view('expertise.form', compact('id', 'Expertise', 'action_url'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'stitle_1' => 'required',
                'mtitle_1' => 'required',
                'stitle_2' => 'required',
                'mtitle_2' => 'required',
                'title_sec1.*' => 'required',
                'description_sec1.*' => 'required',
                'image_sec1.*' => 'mimes:jpg,png,jpeg,gif,svg',
                'title_sec2.*' => 'required',
                'image_sec2.*' => 'mimes:jpg,png,jpeg,gif,svg',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/expertise/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Expertise = Expertise::find($id);
        $Expertise->stitle_1 = $request->stitle_1;
        $Expertise->mtitle_1 = $request->mtitle_1;
        $Expertise->stitle_2 = $request->stitle_2;
        $Expertise->mtitle_2 = $request->mtitle_2;
        $Expertise->save();



        Expertise_Firstsection::where('expertise_id', $id)->delete();
        $title_sec1 = $request->title_sec1;
        $description_sec1 = $request->description_sec1;
        $edit_img1 = $request->edit_img1;
        for ($i = 0; $i < count($title_sec1); $i++) {
            if (!empty($title_sec1[$i]) || !empty($description_sec1[$i])) {
                $Expertise_Firstsection = new Expertise_Firstsection();
                $Expertise_Firstsection->expertise_id = $Expertise->id;
                $Expertise_Firstsection->title = !empty($title_sec1[$i]) ? $title_sec1[$i] : null;
                $Expertise_Firstsection->description = !empty($description_sec1[$i]) ? $description_sec1[$i] : null;
                if ($request->hasfile('image_sec1.' . $i)) {
                    $file = $request->file('image_sec1.' . $i);
                    $imageName = time() . '.' . $file->extension();
                    $file->storeAs('public/expertise/section1/', $imageName);
                    $Expertise_Firstsection->image = $imageName;
                }else{
                    $Expertise_Firstsection->image =  $edit_img1[$i];
                }
                $Expertise_Firstsection->save();
            }
        }

        Expertise_Secondsection::where('expertise_id', $id)->delete();
        $title_sec2 = $request->title_sec2;
        $edit_img2 = $request->edit_img2;
        for ($j = 0; $j < count($title_sec2); $j++) {
            if (!empty($title_sec2[$j])) {
                $Expertise_Secondsection = new Expertise_Secondsection();
                $Expertise_Secondsection->expertise_id = $Expertise->id;
                $Expertise_Secondsection->title = !empty($title_sec2[$j]) ? $title_sec2[$j] : null;
                if ($request->hasfile('image_sec2.' . $j)) {
                    $file = $request->file('image_sec2.' . $j);
                    $logoName = time() . '.' . $file->extension();
                    $file->storeAs('public/expertise/section2/', $logoName);
                    $Expertise_Secondsection->image = $logoName;
                }else{
                    $Expertise_Secondsection->image =  $edit_img2[$j];
                }
                $Expertise_Secondsection->save();
            }
        }
        return redirect('admin/expertise');
    }
}
