<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use Illuminate\Http\Request;

class SegmentController extends Controller
{
    public function index()
    {
        $segments = Segment::orderBy('name')->get();
        return view('admin.segments.index', compact('segments'));
    }

    public function create()
    {
        return view('admin.segments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Segment::create($request->all());

        return redirect()->route('admin.segments.index')
                         ->with('success', 'Segmento cadastrado com sucesso!');
    }

    public function edit(Segment $segment)
    {
        return view('admin.segments.edit', compact('segment'));
    }

    public function update(Request $request, Segment $segment)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $segment->update($request->all());

        return redirect()->route('admin.segments.index')
                         ->with('success', 'Segmento atualizado com sucesso!');
    }

    public function destroy(Segment $segment)
    {
        $segment->delete();

        return redirect()->route('admin.segments.index')
                         ->with('success', 'Segmento excluído com sucesso!');
    }
}