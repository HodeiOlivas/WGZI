<?php

namespace App\Http\Controllers;
use App\Models\Kategoria;
use Illuminate\Http\Request;

class KategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategoriak = Kategoria::all();
        return view('kategoria.index', ['kategoriak' => $kategoriak]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'izena' => 'required|unique:kategorias|max:255',
            'kolorea' => 'required|max:7'
        ]);
    
        $kategoria = new Kategoria;
        $kategoria->izena = $request->izena;
        $kategoria->kolorea = $request->kolorea;
        $kategoria->save();
    
        return redirect()->route('kategoria.index')->with('success', 'Kategoria berria sortu da');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kategoria = Kategoria::find($id);
        return view('kategoria.show', ['kategoria' => $kategoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $kategoria = Kategoria::find($id);
    return view('kategoria.show', ['kategoria' => $kategoria]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'izena' => 'required|max:255',
        'kolorea' => 'required|max:7'
    ]);

    $kategoria = Kategoria::find($id);
    $kategoria->izena = $request->izena;
    $kategoria->kolorea = $request->kolorea;
    $kategoria->save();

    return redirect()->route('kategoria.index')->with('success', 'Kategoria eguneratua');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kategoria = Kategoria::findOrFail($id);
        if ($kategoria->atasak()->exists()) {
            // Si hay registros relacionados, eliminarlos primero
            $kategoria->atasak()->delete();
        }
        $kategoria->delete();

        return redirect()->route('kategoria.index')->with('success', 'Kategoria ezabatua');

    }
}