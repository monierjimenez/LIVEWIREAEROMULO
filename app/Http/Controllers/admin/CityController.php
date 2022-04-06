<?php

namespace App\Http\Controllers\admin;

use App\Citys;
use App\States;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        if ( !in_array('PSV', explode(".", auth()->user()->permissions)) )
            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        $citys = Citys::latest()->get();
        return view('admin.citys.index', compact('citys'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:citys,name']);
        $city = Citys::create([
            'name' => $request->get('name'),
            'url' => Str::slug($request->get('name')),
            'status' => '0',
        ]);
        generaRecords('Citys created', 'City created successfully, for '. auth()->user()->name .'.');
        return redirect()->route('admin.citys.edit', $city);
    }

    public function edit(Citys $city)
    {
        if ( !in_array('PSE', explode(".", auth()->user()->permissions)) )
            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        $states = States::all();
        return view('admin.citys.edit', compact('city', 'states'));
    }

    public function update(Request $request, Citys $city)
    {
        $this->validate($request, [
            'name' => 'required|unique:citys,name,'.$city->id,
            'state_id' => 'required|numeric',
        ]);

        $cambio = $city->name;
        if ( $request->input('name') != $cambio )
            $cambio = "<b>" . $city->name . " </b>  for <b>" . $request->input('name') ." </b>";

        $city->update([
            'state_id' => $request->input('state_id'),
            'name' => $request->input('name'),
            'url' => Str::slug($request->get('name')),
            'status' => $request->input('status'),
        ]);
        $city->save();

        generaRecords('Citys updated', 'City ' .$cambio. ' updated successfully, for '. auth()->user()->name .'.');
        return redirect()->route('admin.citys.edit', $city)->with('flash', 'City has been saved correctly.');
    }

    public function destroy(Citys $city)
    {
        $city->update([
            'status' => '0',
        ]);
        $city->save();
        generaRecords('Citys removed', 'City <b>' .$city->name. '</b> removed successfully, for '. auth()->user()->name .'.');
        return redirect()->route('admin.citys.index')->with('flash', 'City has been removed.');
    }
}
