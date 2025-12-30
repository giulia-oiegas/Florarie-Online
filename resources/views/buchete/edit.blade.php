@extends('layouts.layout')

@section('title', 'Editează Buchet')

@section('content')

<h2>Editare Buchet</h2>

<form method="POST" action="{{ route('buchete.update', $buchet->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nume</label>
        <input type="text" name="nume" class="form-control"
               value="{{ old('nume', $buchet->nume) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Preț</label>
        <input type="number" name="pret" class="form-control"
               value="{{ old('pret', $buchet->pret) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Tip floare</label>
        <select name="tip_floare" class="form-control">
            <option {{ $buchet->tip_floare == 'Trandafiri' ? 'selected' : '' }}>Trandafiri</option>
            <option {{ $buchet->tip_floare == 'Lalele' ? 'selected' : '' }}>Lalele</option>
            <option {{ $buchet->tip_floare == 'Crini' ? 'selected' : '' }}>Crini</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">URL Imagine</label>
        <input type="text" name="imagine_url" class="form-control"
               value="{{ old('imagine_url', $buchet->imagine_url) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Status stoc</label>
        <select name="stoc_status" class="form-control">
            <option value="Disponibil" {{ $buchet->stoc_status == 'Disponibil' ? 'selected' : '' }}>Disponibil</option>
            <option value="Stoc limitat" {{ $buchet->stoc_status == 'Stoc limitat' ? 'selected' : '' }}>Stoc limitat</option>
            <option value="Indisponibil" {{ $buchet->stoc_status == 'Indisponibil' ? 'selected' : '' }}>Indisponibil</option>
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection
