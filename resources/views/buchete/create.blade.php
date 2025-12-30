@extends('layouts.layout')

@section('title', 'Adaugă Buchet')

@section('content')

<h2>Adaugă Buchet Nou</h2>

<form method="POST" action="{{ route('buchete.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nume</label>
        <input type="text" class="form-control" name="nume">
    </div>

    <div class="mb-3">
        <label class="form-label">Preț</label>
        <input type="number" class="form-control" name="pret">
    </div>

    <div class="mb-3">
        <label class="form-label">Tip floare</label>
        <select class="form-control" name="tip_floare">
            <option>Trandafiri</option>
            <option>Lalele</option>
            <option>Crini</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">URL Imagine</label>
        <input type="text" class="form-control" name="imagine_url">
    </div>
    <div class="mb-3">
    <label class="form-label">Status stoc</label>
    <select name="stoc_status" class="form-control">
        <option value="Disponibil" selected>Disponibil</option>
        <option value="Stoc limitat">Stoc limitat</option>
        <option value="Indisponibil">Indisponibil</option>
    </select>
    </div>

    <button class="btn btn-mov">Salvează</button>
</form>

@endsection
