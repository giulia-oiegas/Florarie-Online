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
    
    // Filtrare si cautare :permite utilizatorului să caute flori după tip sau preț maxim
    public function index(Request $request)
    {    // se incepe o interogare, fara executare inca
         $query = Buchet::query();

         // filtrare dupa tip floare
        if ($request->filled('tip_floare')) {
        $query->where('tip_floare', 'like', '%' . $request->tip_floare . '%');
        }   

        // filtrare dupa pret maxim(buchetele mai ieftine de X lei)
        if ($request->filled('pret_maxim')) {
        $query->where('pret', '<=', $request->pret_maxim);
        }
        
        //executare interogare cu sortare si paginare
         $buchete = $query->latest()->paginate(10);

        //luam buchetele din bd, cate 10 per pagina
       // $buchete = Buchet::latest()->paginate(10);

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
            'status' => 'required|in:activ,inactiv', //doar aceste valori sunt permise
            'imagine_url' => 'nullable|url', //link ul sa fie valid
            'descriere' => 'nullable',
        ],
        [
           'pret.min' => 'Prețul nu poate fi negativ!', 
           'pret.numeric' => 'Introdu doar cifre la preț.',
           'nume.required' => 'Numele este obligatoriu.',
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
        $buchet = Buchet::with('recenzii')->findOrFail($id);

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
            'status' => 'required|in:activ,inactiv',
            'imagine_url' => 'nullable|url',
            'descriere' => 'nullable',
        ],
        [//mesaj la eroare
        'pret.min' => 'Prețul nu poate fi negativ!', 
        'pret.numeric' => 'Introdu doar cifre la preț.',
        'nume.required' => 'Numele este obligatoriu.',
        'tip_floare.required' => 'Te rugăm să alegi tipul florii.',
        'imagine_url.url' => 'Link-ul imaginii nu este valid.',

        ]
    
    );
        //gasim buchetul si actualizam datele
        $buchet = Buchet::findOrFail($id);
        $buchet->update($request->all());

        //redirect la lista
        return redirect()->route('buchete.index')
            ->with('success', 'Buchetul a fost actualizat!');
    }
     


    //Exportă lista de buchete în format CSV
   public function export() {
    $buchete = \App\Models\Buchet::all();
    $csvFileName = 'lista_buchete.csv';
    
    //// Setăm antetele (headers) HTTP pentru a forța browserul să descarce fișierul
    $headers = [
        "Content-type" => "text/csv", // Tipul de fișier este CSV
        "Content-Disposition" => "attachment; filename=$csvFileName",  // Numele fișierului salvat
        "Pragma" => "no-cache", // Previne stocarea în cache
        "Expires" => "0" // Fișierul expiră imediat
    ];
     
    // Creăm un stream de date (flux) pentru descărcare
     return response()->stream(function() use ($buchete) {
       // Deschidem un fișier temporar în memoria de ieșire a PHP-ului
        $file = fopen('php://output', 'w');
        fputcsv($file, ['ID', 'Nume', 'Pret', 'Tip Floare']);
       
        // Se parcurge fiecare buchet din baza de date
        foreach ($buchete as $buchet) {
            // Adăugăm datele fiecărui buchet ca un rând nou în CSV
            fputcsv($file, [
                $buchet->id, 
                $buchet->nume, 
                $buchet->pret, 
                $buchet->tip_floare
            ]);
        }
        fclose($file);
    }, 200, $headers);}

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
