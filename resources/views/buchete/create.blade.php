@extends('layouts.layout')

@section('title', 'Adaugă Buchet')

@section('content')

<h2>Adaugă Buchet Nou</h2>

<form method="POST" action="{{ route('buchete.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nume</label>
      <input type="text" class="form-control @error('nume') is-invalid @enderror" name="nume" value="{{ old('nume') }}">
      
      @error('nume')
            <div class="text-danger small">{{ $message }}</div>
      @enderror
    
    </div>

    <div class="mb-3">
        <label class="form-label">Preț</label>
    <input type="number"
       name="pret"
       class="form-control @error('pret') is-invalid @enderror"
       step="any"
       value="{{ old('pret') }}">

       @error('pret')
            <div class="text-danger small">{{ $message }}</div>
       @enderror
       
    </div>

    <div class="mb-3">
        <label class="form-label">Tip floare</label>
       <select class="form-control @error('tip_floare') is-invalid @enderror" name="tip_floare">
        <option value="Trandafiri" {{ old('tip_floare') == 'Trandafiri' ? 'selected' : '' }}>Trandafiri</option>
        <option value="Lalele" {{ old('tip_floare') == 'Lalele' ? 'selected' : '' }}>Lalele</option>
        <option value="Bujori" {{ old('tip_floare') == 'Bujori' ? 'selected' : '' }}>Bujori</option>
        <option value="Crini" {{ old('tip_floare') == 'Crini' ? 'selected' : '' }}>Crini</option>
        <option value="Crizanteme" {{ old('tip_floare') == 'Crizanteme' ? 'selected' : '' }}>Crizanteme</option>
        <option value="Hortensii" {{ old('tip_floare') == 'Hortensii' ? 'selected' : '' }}>Hortensii</option>
        <option value="Magnolii" {{ old('tip_floare') == 'Magnolii' ? 'selected' : '' }}>Magnolii</option>
        <option value="Orhidei" {{ old('tip_floare') == 'Orhidei' ? 'selected' : '' }}>Orhidei</option>
        <option value="Mix" {{ old('tip_floare') == 'Mix' ? 'selected' : '' }}>Mix</option>
    </select>
            
        </select>
        @error('tip_floare')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
    <label class="form-label">Descriere</label>
    <textarea name="descriere" class="form-control" rows="3">{{ old('descriere') }}</textarea>
    </div>


    <div class="mb-3">
        <label class="form-label">URL Imagine</label>
       <input type="text" class="form-control @error('imagine_url') is-invalid @enderror" name="imagine_url" value="{{ old('imagine_url') }}">
        @error('imagine_url')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-control @error('status') is-invalid @enderror">
        <option value="activ" {{ old('status') == 'activ' ? 'selected' : '' }}>activ</option>
        <option value="inactiv" {{ old('status') == 'inactiv' ? 'selected' : '' }}>inactiv</option>
    </select>

       @error('status')
        <div class="text-danger small">{{ $message }}</div>
    @enderror

    </div>

    <button class="btn btn-mov">Salvează</button>
</form>

@endsection
