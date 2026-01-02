@extends('layouts.layout')

@section('title', 'Lista Evenimente')

@section('content')

{{-- 1. TITLU ȘI BUTOANE (Exact ca la Buchete) --}}
<h2 class="mb-3">Evenimente și Ateliere</h2>

<div class="d-flex justify-content-between align-items-center mb-4">
    {{-- Folosim clasa btn-mov ca să fie butonul mov --}}
    <a href="#" class="btn btn-mov">
        Adaugă eveniment
    </a>
</div>

{{-- 2. GRID-UL DE CARDURI (Păstrăm structura, schimbăm culorile) --}}
<div class="row">
    @forelse($evenimente as $eveniment)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">

                    {{-- DATA EVENIMENTULUI - Aici folosim culoarea MOV în loc de roșu --}}
                    <div class="mb-2">
                        <span class="badge" style="background-color: #6A1B9A; font-size: 0.9rem;">
                            📅 {{ \Carbon\Carbon::parse($eveniment->data_eveniment)->format('d M Y, H:i') }}
                        </span>
                    </div>

                    {{-- TITLUL - Font simplu, curat --}}
                    <h5 class="card-title fw-bold text-dark">
                        {{ $eveniment->nume_eveniment }}
                    </h5>

                    {{-- DESCRIERE --}}
                    <p class="card-text text-muted mt-3">
                        {{ Str::limit($eveniment->descriere, 120) }}
                    </p>

                    {{-- LOCAȚIE (Dacă există) --}}
                    @if(!empty($eveniment->locatie))
                        <p class="small text-muted mb-0">
                            📍 {{ $eveniment->locatie }}
                        </p>
                    @endif
                </div>

                {{-- FOOTER CARD - Butoane simple --}}
                <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                    {{-- Butonul EDIT --}}
                    <a href="{{ route('evenimente.edit', $eveniment->id) }}" class="btn btn-outline-primary btn-sm">
                        Editează
                    </a>

                    {{-- Butonul DELETE (trebuie să fie într-un formular pentru securitate) --}}
                    <form action="{{ route('evenimente.destroy', $eveniment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Ești sigur că vrei să ștergi acest eveniment?')">
                             Șterge
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-light border text-center">
                Nu există evenimente programate momentan.
            </div>
        </div>
    @endforelse
</div>

@endsection
