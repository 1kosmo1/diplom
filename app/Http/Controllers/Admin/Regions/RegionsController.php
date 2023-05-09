<?php

namespace App\Http\Controllers\Admin\Regions;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    public function index(){
        $regions = Region::all();

        return view('admin.regions.index',compact('regions'));
    }

    public function create(){
        return view('admin.regions.create');
    }

    public function store(Request $request){
        $request->validate([
           'name' => 'string',
        ]);

        Region::create([
           'name' => $request->name,
        ]);

        return redirect()->route('admin.regions.index');
    }

    public function edit(Region $region){
        return view('admin.regions.edit',compact('region'));
    }

    public function update(Request $request, $id){
        $region = Region::find($id);

        $region->update([
           'name' => $request->name,
        ]);

        return redirect()->route('admin.regions.index');
    }

    public function destroy(Request $request){
        Region::where('id',$request->id)->delete();

        return redirect()->route('admin.regions.index');
    }
}
