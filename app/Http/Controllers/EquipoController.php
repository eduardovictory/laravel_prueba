<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EquipoRequest;
use App\Models\Equipo;


class EquipoController extends Controller
{

    public function index()
    {
        $equipos = Equipo::paginate(10);
        return view('equipos.index', compact('equipos'));
    }

    public function show(Request $request, Equipo $equipo)
    {
        return view('equipos.show', compact('equipo'));
    }

    public function create()
    {
        return view('equipos.create');
    }

    public function store(EquipoRequest $request)
    {
        $data = $request->validated();
        $equipo = Equipo::create($data);
        return redirect()->route('equipos.index')->with('status', 'Equipo created!');
    }

    public function edit(Request $request, Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    public function update(EquipoRequest $request, Equipo $equipo)
    {
        $data = $request->validated();
        $equipo->fill($data);
        $equipo->save();
        return redirect()->route('equipos.index')->with('status', 'Equipo updated!');
    }

    public function destroy(Request $request, Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index')->with('status', 'Equipo destroyed!');
    }
}
