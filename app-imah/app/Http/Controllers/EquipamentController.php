<?php

namespace App\Http\Controllers;

use App\Models\Equipament;
use Illuminate\Http\Request;

class EquipamentController extends Controller
{
    public function index()
    {
        $equipaments = Equipament::orderBy('name')->get();
        return view('admin.equipaments.index', compact('equipaments'));
    }

    public function create()
    {
        return view('admin.equipaments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Equipament::create($request->all());

        return redirect()->route('admin.equipaments.index')
                         ->with('success', 'Equipamento cadastrado com sucesso!');
    }

    public function edit(Equipament $equipament)
    {
        return view('admin.equipaments.edit', compact('equipament'));
    }

    public function update(Request $request, Equipament $equipament)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $equipament->update($request->all());

        return redirect()->route('admin.equipaments.index')
                         ->with('success', 'Equipamento atualizado com sucesso!');
    }

    public function destroy(Equipament $equipament)
    {
        $equipament->delete();

        return redirect()->route('admin.equipaments.index')
                         ->with('success', 'Equipamento excluído com sucesso!');
    }
}