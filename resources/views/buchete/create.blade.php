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
    <input type="number"
       name="pret"
       class="form-control"
       step="any"
       value="{{ old('pret' }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Tip floare</label>
        <select class="form-control" name="tip_floare">
            <option>Trandafiri</option>
            <option>Lalele</option>
            <option>Bujori</option>
            <option>Crini</option>
            <option>Crizanteme</option>
            <option>Hortensii</option>
            <option>Lalele</option>
            <option>Magnolii</option>
            <option>Orhidei</option>
            <option>Trandafiri</option>
            <option>Mix</option>
            
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">URL Imagine</label>
        <input type="text" class="form-control" name="imagine_url">
    </div>
    <div class="mb-3">
    <label class="form-label">Status stoc</label>
    <select name="status" class="form-control">
    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Disponibil</option>
    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Stoc limitat</option>
    <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Indisponibil</option>
</select>


    </div>

    <button class="btn btn-mov">Salvează</button>
</form>

@endsection
