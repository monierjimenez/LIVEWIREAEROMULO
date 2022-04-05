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
        return view('admin.states.edit', compact('state'));
    }

    public function update(Request $request, States $state)
    {
        $this->validate($request, [
            'name' => 'required|unique:states,name,'.$state->id,
        ]);
       // dd(4);

        $state->update([
            'name' => $request->input('name'),
            'url' => Str::slug($request->get('name')),
            'status' => $request->input('status'),
        ]);
        $state->save();
       // notify()->success('Welcome to Laravel Notify ⚡️');
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
