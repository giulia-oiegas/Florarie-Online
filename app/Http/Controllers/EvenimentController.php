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

    public function create()
    {
        return view('evenimente.create');
    }

    //salvare in bd - create partea 2
    public function store(Request $request)
    {
        //validare date
        $request->validate([
            'nume' => 'required|max:255',
            'data_eveniment' => 'required|date',
            'descriere' => 'required',
            'locatie' => 'nullable|string'
        ],[
            'nume.required' => 'Numele evenimentului este obligatoriu.',
            'nume.max' => 'Numele nu poate depăși 255 de caractere.',
            'data_eveniment.required' => 'Trebuie să selectezi data evenimentului.',
            'data_eveniment.date' => 'Formatul datei nu este valid.',
            'descriere.required' => 'Te rugăm să adaugi o scurtă descriere.',
            'locatie.string' => 'Locația trebuie să fie un text valid.',
        ]);

        //creare eveniment nou
        Eveniment::create($request->all());

        return redirect()->route('evenimente.index')
                         ->with('success', 'Evenimentul a fost adăugat cu succes!');
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
        ],
        [
            'nume.required' => 'Te rugăm să introduci numele evenimentului.',
            'data_eveniment.required' => 'Data evenimentului este obligatorie.',
            'descriere.required' => 'Descrierea evenimentului nu poate lipsi.',
            ]
    );

        $eveniment = Eveniment::findOrFail($id);
        $eveniment->update($request->all());

        return redirect()->route('evenimente.index')
                         ->with('success', 'Evenimentul a fost actualizat!');
    }
}
