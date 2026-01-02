<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eveniment;

class EvenimentController extends Controller
{
    public function index() {
        //luam evenimentele si le ordonam cronologic (cele mai apropiate primele)
        $evenimente = Eveniment::orderBy('data_eveniment', 'asc')->get();

        return view('evenimente.index', compact('evenimente'));
    }

    public function destroy($id)
    {
        $eveniment = Eveniment::findOrFail($id);
        $eveniment->delete();

        return redirect()->route('evenimente.index')
                         ->with('success', 'Evenimentul a fost șters cu succes!');
    }

    public function edit($id)
    {
        $eveniment = Eveniment::findOrFail($id);
        return view('evenimente.edit', compact('eveniment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nume' => 'required',
            'data_eveniment' => 'required',
            'descriere' => 'required',
        ]);

        $eveniment = Eveniment::findOrFail($id);
        $eveniment->update($request->all());

        return redirect()->route('evenimente.index')
                         ->with('success', 'Evenimentul a fost actualizat!');
    }
}
