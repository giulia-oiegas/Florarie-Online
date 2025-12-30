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
        <div class="mb-3">
    
    <select name="tip_floare" class="form-control">

        <option value="Trandafiri" {{ $buchet->tip_floare == 'Trandafiri' ? 'selected' : '' }}>
            Trandafiri
        </option>

        <option value="Lalele" {{ $buchet->tip_floare == 'Lalele' ? 'selected' : '' }}>
            Lalele
        </option>

        <option value="Bujori" {{ $buchet->tip_floare == 'Bujori' ? 'selected' : '' }}>
            Bujori
        </option>

        <option value="Crini" {{ $buchet->tip_floare == 'Crini' ? 'selected' : '' }}>
            Crini
        </option>

        <option value="Crizanteme" {{ $buchet->tip_floare == 'Crizanteme' ? 'selected' : '' }}>
            Crizanteme
        </option>

        <option value="Hortensii" {{ $buchet->tip_floare == 'Hortensii' ? 'selected' : '' }}>
            Hortensii
        </option>

        <option value="Magnolii" {{ $buchet->tip_floare == 'Magnolii' ? 'selected' : '' }}>
            Magnolii
        </option>

        <option value="Orhidei" {{ $buchet->tip_floare == 'Orhidei' ? 'selected' : '' }}>
            Orhidei
        </option>

        <option value="Mix" {{ $buchet->tip_floare == 'Mix' ? 'selected' : '' }}>
            Mix
        </option>

    </select>
</div>

    </div>

    <div class="mb-3">
        <label class="form-label">URL Imagine</label>
        <input type="text" name="imagine_url" class="form-control"
               value="{{ old('imagine_url', $buchet->imagine_url) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Status stoc</label>
        <select name="status" class="form-control">
    <option value="0" {{ $buchet->status == 0 ? 'selected' : '' }}>Disponibil</option>
    <option value="1" {{ $buchet->status == 1 ? 'selected' : '' }}>Stoc limitat</option>
    <option value="2" {{ $buchet->status == 2 ? 'selected' : '' }}>Indisponibil</option>
</select>

    </div>

    <button class="btn btn-outline-primary btn-sm">Update</button>
</form>

@endsection
