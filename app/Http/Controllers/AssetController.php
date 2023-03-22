<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    function show()
    {
        $data=Asset::all();
        return view('dashboard',['asset'=>$data]);
    }
}
