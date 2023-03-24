<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    // return array
    function list()
    {
        $data = Asset::get();
        return view('dashboard.index', ['asset' => $data]);
    }

    // return single records
    function show($id, Request $request)
    {
        $data = Asset::find($id);
        // dd($data);
        return view('dashboard.show', ['asset' => $data]);
    }

    public function create()
    {
        return view('admin.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'type'=> 'required',
            'description'=> 'required',
            'quantity'=> 'required | integer',
        ]);

        $data = new Asset;
        $data->type = $request->type;
        $data->description = $request->description;
        $data->quantity = $request->quantity;

        $data->save();
        return back()->with('success', 'Asset Successfully Added !');

    }
}
