<?php

namespace App\Http\Controllers\admin;

use App\Municipios;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
    public function index()
    {

        $municipios = Municipios::latest()->get();
		dd(Municipios::latest()->get());
        return view('admin.municipios.index', compact('municipios'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:municipios,name']);
        $municipio = Municipios::create([
            'name' => $request->get('name'),
            'url' => Str::slug($request->get('name')),
            'status' => '0',
        ]);
        return redirect()->route('admin.municipios.edit', $municipio);
    }

    public function edit(Municipios $municipio)
    {
        $estados = Estados::where('status', '=', '1')->get();
        return view('admin.municipios.edit', compact('municipio', 'estados'));
    }

    public function update(Request $request, Municipios $municipio)
    {
        $this->validate($request, [
            'name' => 'required|unique:municipios,name,'.$municipio->id,
            'estado_id' => 'required|numeric',
        ]);

        $municipio->update([
            'estado_id' => $request->input('estado_id'),
            'name' => $request->input('name'),
            'url' => Str::slug($request->get('name')),
            'status' => $request->input('status'),
        ]);
        $municipio->save();
        return redirect()->route('admin.municipios.edit', $municipio)->with('flash', 'Municipio has been saved correctly.');
    }

    public function destroy(Estados $state)
    {
        $state->update([
            'status' => '0',
        ]);
        $state->save();
        return redirect()->route('admin.states.index')->with('flash', 'State has been removed.');
    }
}
