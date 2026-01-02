@extends('layouts.layout')

@section('title', 'Adaugă Eveniment')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="mb-4">Adaugă un Eveniment Nou</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                {{-- Formularul trimite către metoda STORE --}}
                <form action="{{ route('evenimente.store') }}" method="POST">
                    @csrf

                    {{-- Nume Eveniment --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nume Eveniment</label>
                        <input type="text" name="nume" class="form-control @error('nume') is-invalid @enderror" placeholder="Ex: Atelier Coronițe" value="{{ old('nume') }}" >
                    
                        @error('nume')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Data și Ora --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Data și Ora</label>
                        <input type="datetime-local" name="data_eveniment"class="form-control @error('data_eveniment') is-invalid @enderror" 
                               value="{{ old('data_eveniment') }}">
                               @error('data_eveniment')
                            <div class="text-danger small">{{ $message }}</div>
                              @enderror
                    </div>

                    {{-- Descriere --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Descriere</label>
                        <textarea name="descriere" class="form-control @error('descriere') is-invalid @enderror" rows="4" placeholder="Detalii despre eveniment..." >{{ old('descriere') }}</textarea>
                        @error('descriere')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Butoane Acțiune --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('evenimente.index') }}" class="btn btn-outline-secondary">Anulează</a>
                        <button type="submit" class="btn btn-mov">Adaugă Eveniment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
