<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Request as ModelRequest;
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
            'quantity' => 'integer',
        ]);

        $data = new Asset;
        $data->type = $request->type;
        $data->description = $request->description;
        $data->quantity = $request->quantity;

        $data->save();
        return back()->with('success', 'Asset Successfully Added !');
    }

    public function createRequest()
    {
        $assets = Asset::get(); //return array
        // $assets = Asset::where('id',1)->first(); //return one

        return view('request')->with('assets', $assets);
    }

    public function store_request(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'asset_type' => 'required',
            'requester_id' => 'required',
        ]);

        $data = new ModelRequest();
        $data->title = $request->title;
        $data->asset_type = $request->asset_type;
        $data->requester_id = $request->requester_id;

        $data->save();
        return back()->with('success', 'Items Successfully Requested !');
    }

    public function request_list()
    {

        $data = ModelRequest::get();
        // dd($data);
        return view('admin.index', ['asset' => $data]);
    }

    public function request_update($id)
    {
        $data = ModelRequest::find($id)->get();
        return view('admin.request.edit', compact('id'));

    }
}
