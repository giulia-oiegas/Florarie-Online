@extends('layouts.layout')

@section('title', 'Editează Buchet')

@section('content')

<h2>Editare Buchet</h2>

<form method="POST" action="{{ route('buchete.update', $buchet->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nume</label>
       <input type="text" name="nume" class="form-control @error('nume') is-invalid @enderror"
               value="{{ old('nume', $buchet->nume) }}">
    
        @error('nume')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
     </div>

    <div class="mb-3">
        <label class="form-label">Preț</label>
        <input type="number" step="any" name="pret" class="form-control @error('pret') is-invalid @enderror"
               value="{{ old('pret', $buchet->pret) }}">
      @error('pret')
            <div class="text-danger small">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Tip floare</label>
        <div class="mb-3">
    
    <select name="tip_floare" class="form-control @error('tip_floare') is-invalid @enderror">

        <option value="Trandafiri" {{ old('tip_floare', $buchet->tip_floare) == 'Trandafiri' ? 'selected' : '' }}>Trandafiri</option>
            <option value="Lalele" {{ old('tip_floare', $buchet->tip_floare) == 'Lalele' ? 'selected' : '' }}>Lalele</option>
            <option value="Bujori" {{ old('tip_floare', $buchet->tip_floare) == 'Bujori' ? 'selected' : '' }}>Bujori</option>
            <option value="Crini" {{ old('tip_floare', $buchet->tip_floare) == 'Crini' ? 'selected' : '' }}>Crini</option>
            <option value="Crizanteme" {{ old('tip_floare', $buchet->tip_floare) == 'Crizanteme' ? 'selected' : '' }}>Crizanteme</option>
            <option value="Hortensii" {{ old('tip_floare', $buchet->tip_floare) == 'Hortensii' ? 'selected' : '' }}>Hortensii</option>
            <option value="Magnolii" {{ old('tip_floare', $buchet->tip_floare) == 'Magnolii' ? 'selected' : '' }}>Magnolii</option>
            <option value="Orhidei" {{ old('tip_floare', $buchet->tip_floare) == 'Orhidei' ? 'selected' : '' }}>Orhidei</option>
            <option value="Mix" {{ old('tip_floare', $buchet->tip_floare) == 'Mix' ? 'selected' : '' }}>Mix</option>

    </select>
    @error('tip_floare')
            <div class="text-danger small">{{ $message }}</div>
     @enderror
</div>

    </div>

    <div class="mb-3">
        <label class="form-label">URL Imagine</label>
       <input type="text" name="imagine_url" class="form-control @error('imagine_url') is-invalid @enderror"
               value="{{ old('imagine_url', $buchet->imagine_url) }}">
       @error('imagine_url')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
            </div>

    <div class="mb-3">
        <label class="form-label">Status stoc</label>
       <select name="status" class="form-control @error('status') is-invalid @enderror">
    <option value="0" {{ $buchet->status == 0 ? 'selected' : '' }}>Disponibil</option>
    <option value="1" {{ $buchet->status == 1 ? 'selected' : '' }}>Stoc limitat</option>
    <option value="2" {{ $buchet->status == 2 ? 'selected' : '' }}>Indisponibil</option>
</select>
        @error('status')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <button class="btn btn-outline-primary btn-sm">Update</button>
</form>

@endsection
