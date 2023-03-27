<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\request as ModelsRequest;
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

    public function create_request()
    {
        return view('request');
    }

    public function store_request(Request $request)
    {

        $request->validate([
            'title'=> 'required',
            'asset_type'=> 'required',
            'requester_id'=> 'required',
        ]);

        $data = new ModelsRequest();
        $data->title = $request->title;
        $data->asset_type = $request->asset_type;
        $data->requester_id = $request->requester_id;

        $data->save();
        return back()->with('success', 'Items Successfully Requested !');

    }
}
