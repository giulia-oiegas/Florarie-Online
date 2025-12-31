@extends('layouts.layout')

@section('title', 'Lista Buchete')

@section('content')

<h2 class="mb-3">Lista Buchetelor</h2>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('buchete.create') }}" class="btn btn-mov mb-3">
    Adaugă buchet
    </a>

    <a href="{{ route('buchete.export') }}" class="btn btn-success">
        Export CSV
    </a>
</div>

<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <form action="{{ route('buchete.index') }}" method="GET" class="row g-3 align-items-end">
            
            {{-- Filtru Tip Floare (Select) --}}
            <div class="col-md-3">
                <label class="form-label small fw-bold">Tip Floare</label>
                <select name="tip_floare" class="form-control">
                    <option value="">Toate florile</option>
                    <option value="Trandafiri" {{ request('tip_floare') == 'Trandafiri' ? 'selected' : '' }}>Trandafiri</option>
                    <option value="Lalele" {{ request('tip_floare') == 'Lalele' ? 'selected' : '' }}>Lalele</option>
                    <option value="Bujori" {{ request('tip_floare') == 'Bujori' ? 'selected' : '' }}>Bujori</option>
                    <option value="Crini" {{ request('tip_floare') == 'Crini' ? 'selected' : '' }}>Crini</option>
                    <option value="Crizanteme" {{ request('tip_floare') == 'Crizanteme' ? 'selected' : '' }}>Crizanteme</option>
                    <option value="Hortensii" {{ request('tip_floare') == 'Hortensii' ? 'selected' : '' }}>Hortensii</option>
                    <option value="Magnolii" {{ request('tip_floare') == 'Magnolii' ? 'selected' : '' }}>Magnolii</option>
                    <option value="Orhidei" {{ request('tip_floare') == 'Orhidei' ? 'selected' : '' }}>Orhidei</option>
                    <option value="Mix" {{ request('tip_floare') == 'Mix' ? 'selected' : '' }}>Mix</option>
                </select>
            </div>

            {{-- Filtru Pret Maxim --}}
            <div class="col-md-3">
                <label class="form-label small fw-bold">Preț Maxim (lei)</label>
                <input type="number" name="pret_maxim" class="form-control" 
                       placeholder="Ex: 150" 
                       value="{{ request('pret_maxim') }}">
            </div>
            <div class="col-md-5">
                <button type="submit" class="btn btn-primary">Filtrează</button>
                <a href="{{ route('buchete.index') }}" class="btn btn-outline-secondary">Resetează</a>
            </div>
        </form>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nume</th>
            <th>Preț</th>
            <th>Tip floare</th>
            <th>Status</th>
            <th>Acțiuni</th>
        </tr>
    </thead>
    <tbody>
        @forelse($buchete as $buchet)
        <tr>
            <td>{{ $buchet->nume }}</td>
            <td>{{ $buchet->pret }} lei</td>
            <td>{{ $buchet->tip_floare }}</td>
            <td>
            @if($buchet->status == 0)
                Disponibil
            @elseif($buchet->status == 1)
                Stoc limitat
            @elseif($buchet->status == 2)
                Indisponibil
            
            @endif
        </td>

            <td>
                <a href="{{ route('buchete.show', $buchet->id) }}"
                   class="btn btn-outline-info btn-sm">View</a>

                <a href="{{ route('buchete.edit', $buchet->id) }}"
                   class="btn btn-outline-primary btn-sm">Edit</a>

                <form action="{{ route('buchete.destroy', $buchet->id) }}"
                      method="POST"
                      style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm"
                            onclick="return confirm('Sigur vrei să ștergi buchetul?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Nu există buchete</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
