<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clients;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ClientsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Clients::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('clnt', function ($row) {
                    $imagePath = 'clients/' . $row->image;
                    $iimg = asset("storage/{$imagePath}");
                    $clnt = '<div class="img_div"><img src="' . $iimg . '" alt="image" class="img-fluid rounded me-3"></div>';

                    return $clnt;
                })
                ->addColumn('action', function ($row) {
                    $url_ig = url('admin/clients/update/' . $row->id);
                    $actionBtn = '<a href=' . $url_ig . ' class="btn btn-info"><i class="bx bxs-edit"></i></a>';
                    $actionBtn .= '&nbsp;&nbsp;<a onclick="delete_record(' . $row->id . ')" href="#" class="btn btn-danger"><i class="bx bxs-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'clnt'])
                ->make(true);
        }
        return view('clients.index');
    }

    public function create()
    {
        $Clients = new Clients();
        $id = "";
        $action_url = url('admin/clients/create');
        return view('clients.form', compact('id', 'Clients', 'action_url'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'required|mimes:jpg,png,jpeg,gif,svg',
            ]
        );
        if ($validator->fails()) {
            return redirect('admin/clients/create')
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Clients = new Clients();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $imageName2 = time() . '.' . $file->extension();
            $file->storeAs('public/clients/', $imageName2);
            $Clients->image = $imageName2;
        }
        $Clients->save();
        return redirect('admin/clients');
    }

    public function edit(string $id)
    {
        $Clients = Clients::find($id);
        $action_url = url('admin/clients/update/' . $id);
        return view('clients.form', compact('id', 'Clients', 'action_url'));
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
            return redirect('admin/clients/update/' . $id)
                ->withErrors($validator)
                ->withInput(); // This will repopulate the form fields with old input data
        }
        $Clients = Clients::find($id);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $imageName2 = time() . '.' . $file->extension();
            $file->storeAs('public/clients/', $imageName2);
            $Clients->image = $imageName2;
        }
        $Clients->save();
        return redirect('admin/clients');
    }

    public function destroy(string $id)
    {
        $resource = Clients::findOrFail($id);
        $resource->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
