@extends('layouts.layout')

@section('title', 'Detalii Buchet')

@section('content')

<h2>{{ $buchet->nume }}</h2>

<p><strong>Preț:</strong> {{ $buchet->pret }} lei</p>
<p><strong>Tip floare:</strong> {{ $buchet->tip_floare }}</p>
@if($buchet->descriere)
    <p><strong>Descriere:</strong> {{ $buchet->descriere }}</p>
@endif

<p><strong>Status:</strong> {{ $buchet->status }}</p>

<img src="{{ $buchet->imagine_url }}"
     class="img-fluid mt-3"
     style="max-width:300px">

<br><br>
<a href="{{ route('buchete.index') }}" class="btn btn-secondary">
    Înapoi la listă
</a>

@endsection
