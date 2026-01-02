@extends('layouts.layout')

@section('title', 'Editează Eveniment')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="mb-4">Editează Eveniment</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('evenimente.update', $eveniment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nume Eveniment --}}
                    <div class="mb-3">
                        <label class="form-label">Nume Eveniment</label>
                        <input type="text" name="nume_eveniment" class="form-control" value="{{ old('nume', $eveniment->nume_eveniment) }}" required>
                    </div>

                    {{-- Data și Ora --}}
                    <div class="mb-3">
                        <label class="form-label">Data și Ora</label>
                        {{-- Notă: input datetime-local are nevoie de formatul Y-m-d\TH:i --}}
                        <input type="datetime-local" name="data_eveniment" class="form-control"
                               value="{{ date('Y-m-d\TH:i', strtotime($eveniment->data_eveniment)) }}" required>
                    </div>

                    {{-- Descriere --}}
                    <div class="mb-3">
                        <label class="form-label">Descriere</label>
                        <textarea name="descriere" class="form-control" rows="4" required>{{ old('descriere', $eveniment->descriere) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('evenimente.index') }}" class="btn btn-secondary">Anulează</a>
                        <button type="submit" class="btn btn-mov">Salvează Modificările</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
