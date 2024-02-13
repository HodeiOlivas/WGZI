<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atasa;
use App\Models\Kategoria;

class AtasaController extends Controller
{
    //
    /** index - erakutsi atasak
     * store - atasa gorde
     * update - atasa eguneratu
     * destroy - atasa ezabatu
     * edit - atasa editatu
     */

     public function store(Request $request){

        $request->validate([
            'izena'=> 'required|min:3'
        ]);

    $atasa = new Atasa;
    $atasa->izena = $request->izena;
    $atasa->kategoria_id = $request->kategoria_id;
    $atasa->save();

    return redirect()->route('atasak')->with('success','Atasa ondo gorde da');
}

public function prueba(){
    $partida = Atasa::all();
    return response()->json($partida, 200);
}
public function index(Request $request){

    $atasak = Atasa::all();
    $kategoriak = Kategoria::all();
    return view('atasak.index', ['atasak' => $atasak, 'kategoriak' =>$kategoriak ]);
}

public function show($id){

    $atasa = Atasa::find($id);
    return view('atasak.show', ['atasa' => $atasa ]);
}

public function update(Request $request, $id){

    $atasa = Atasa::find($id);
    $atasa->izena = $request->izena;
    $atasa->save();

   // return view('atasak.index', ['success' => 'Atasa ondo eguneratu da' ]);  index-era ATASA guztiak pasatu behar dizkiogu.
   return redirect()->route('atasak')->with('success', 'Atasa ondo eguneratu da');
}

public function destroy($id){

    $atasa = Atasa::find($id);
    $atasa->delete();

    return redirect()->route('atasak')->with('success', 'Atasa ezabatu da');
}
public function edit($id)
{
    $atasa = Atasa::find($id);
    return view('atasak.show', ['atasa' => $atasa]);
}
}