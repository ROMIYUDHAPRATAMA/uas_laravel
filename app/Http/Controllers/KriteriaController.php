<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kriteria' => 'required|unique:kriterias',
            'nama_kriteria' => 'required',
            'jenis_kriteria' => 'required|in:Cost,Benefit',
            'bobot' => 'required|numeric',
        ]);

        Kriteria::create($request->all());
        return redirect()->route('kriteria.index')
            ->with('success', 'Kriteria created successfully.');
    }

    public function show($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.show', compact('kriteria'));
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kriteria' => 'required|unique:kriterias,kode_kriteria,' . $id,
            'nama_kriteria' => 'required',
            'jenis_kriteria' => 'required|in:Cost,Benefit',
            'bobot' => 'required|numeric',
        ]);

        $kriteria = Kriteria::find($id);
        $kriteria->update($request->all());
        return redirect()->route('kriteria.index')
            ->with('success', 'Kriteria updated successfully.');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        return redirect()->route('kriteria.index')
            ->with('success', 'Kriteria deleted successfully.');
    }
}
