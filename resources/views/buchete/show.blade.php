@extends('layouts.layout')

@section('title', 'Detalii Buchet')

@section('content')

<h2 class="mb-3">{{ $buchet->nume }}</h2>

<div class="row">
    <div class="col-md-7">
        <p><strong>Preț:</strong> {{ $buchet->pret }} lei</p>
        <p><strong>Tip floare:</strong> {{ $buchet->tip_floare }}</p>
        <p><strong>Status:</strong> {{ $buchet->status }}</p>

        @if($buchet->descriere)
            <p class="mt-3">
                <strong>Descriere:</strong><br>
                {{ $buchet->descriere }}
            </p>
        @endif
    </div>

    <div class="col-md-5">
        @if($buchet->imagine_url)
            <img src="{{ $buchet->imagine_url }}"
                 class="img-fluid rounded shadow-sm"
                 alt="Imagine buchet">
        @endif
    </div>
</div>

<hr class="my-4">

<h4>Recenzii</h4>

@if($buchet->recenzii->count())
    @foreach($buchet->recenzii as $recenzie)
        <div class="border rounded p-3 mb-3">
            <p class="mb-1">
                <strong>{{ $recenzie->nume_client }}</strong>
                <span class="text-muted">– {{ $recenzie->nota }}/5</span>
            </p>
            <p class="mb-0">
                {{ $recenzie->text_recenzie }}
            </p>
        </div>
    @endforeach
@else
    <p class="text-muted">Nu există recenzii pentru acest buchet.</p>
@endif

<a href="{{ route('buchete.index') }}" class="btn btn-secondary mt-4">
    Înapoi la listă
</a>

@endsection
