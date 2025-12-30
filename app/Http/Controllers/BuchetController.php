<?php

namespace App\Http\Controllers;

use App\Models\Buchet;
use Illuminate\Http\Request;


class BuchetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //luam buchetele din bd, cate 10 per pagina
        $buchete = Buchet::latest()->paginate(10);

        //le trimitem catre view (pagina html)
        return view('buchete.index', compact('buchete'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buchete.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validarea datelor
        $request->validate([
            'nume' => 'required',
            'pret' => 'required|numeric|min:0', //pretul trebuie sa fie numar
            'tip_floare' => 'required',
            'status' => 'required|in:0,1,2', //doar aceste valori sunt permise
            'imagine_url' => 'nullable|url', //link ul sa fie valid
            'descriere' => 'nullable',
        ]);

        //salvarea in bd - ia toate datele validate si face un rand nou in tabel
        Buchet::create($request->all());

        //redirectionarea userului - dupa ce a salvat, il trimitem inapoi la lista cu un mesaj de succes
        return redirect()->route('buchete.index')
                         ->with('success', 'Buchetul a fost adaugat cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //cautam buchetul - daca nu exista => error 404
        $buchet = Buchet::findOrFail($id);

        //trimitem datele catre view-ul de detalii
        return view('buchete.show', compact('buchet'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //cautam buchetul - daca nu exista => error 404
        $buchet = Buchet::findOrFail($id);

        //trimitem datele catre view-ul de editare
        return view('buchete.edit', compact('buchet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nume' => 'required',
            'pret' => 'required|numeric|min:0',
            'tip_floare' => 'required',
            'status' => 'required|in:0,1,2',
            'imagine_url' => 'nullable|url',
            'descriere' => 'nullable',
        ]);

        $buchet = Buchet::findOrFail($id);
        $buchet->update($request->all());

        return redirect()->route('buchete.index')
            ->with('success', 'Buchetul a fost actualizat!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buchet = Buchet::findOrFail($id);
        $buchet->delete();

        return redirect()->route('buchete.index')
                         ->with('success', 'Buchetul a fost sters!');
    }
}
