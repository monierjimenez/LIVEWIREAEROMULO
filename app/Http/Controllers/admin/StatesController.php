<?php

namespace App\Http\Controllers\admin;

use App\States;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    public function index()
    {
        permitUser('PSV', auth()->user()->permissions );
//        if ( !in_array('PSV', explode(".", auth()->user()->permissions)) )
//            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        $states = States::latest()->get();
        return view('admin.states.index', compact('states'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:states,name']);
        $state = States::create([
            'name' => $request->get('name'),
            'url' => Str::slug($request->get('name')),
            'status' => '0',
        ]);
        generaRecords('States created', 'States created successfully, for '. auth()->user()->name .'.');
        return redirect()->route('admin.states.edit', $state);
    }

    public function edit(States $state)
    {
        permitUser('PSE', auth()->user()->permissions );
//        if ( !in_array('PSE', explode(".", auth()->user()->permissions)) )
//            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        return view('admin.states.edit', compact('state'));
    }

    public function update(Request $request, States $state)
    {
        $this->validate($request, [
            'name' => 'required|unique:states,name,'.$state->id,
        ]);

        $state->update([
            'name' => $request->input('name'),
            'url' => Str::slug($request->get('name')),
            'status' => $request->input('status'),
        ]);
        $state->save();

        generaRecords('States updated', 'States <b>' .$request->input('name'). '</b> updated successfully, for '. auth()->user()->name .'.');
        return redirect()->route('admin.states.edit', $state)->with('flash', 'State has been saved correctly.');
    }

    public function destroy(States $state)
    {
        $state->update([
            'status' => '0',
        ]);
        $state->save();
        generaRecords('States removed', 'States <b>' .$state->name. '</b> removed successfully, for '. auth()->user()->name .'.');
        return redirect()->route('admin.states.index')->with('flash', 'State has been removed.');
    }
}
