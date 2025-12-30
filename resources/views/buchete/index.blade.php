@extends('layouts.layout')

@section('title', 'Lista Buchete')

@section('content')

<h2 class="mb-3">Lista Buchetelor</h2>

<a href="{{ route('buchete.create') }}" class="btn btn-mov mb-3">
    Adaugă buchet
</a>

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
            <td>{{ $buchet->stoc_status }}</td>
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
