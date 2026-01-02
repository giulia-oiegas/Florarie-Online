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

@if($buchet->imagine_url)
    <img src="{{ $buchet->imagine_url }}"
         class="img-fluid mt-3 mb-4"
         style="max-width:300px">
@endif

<hr>

<h4>Recenzii</h4>

@if($buchet->recenzii->count())
    @foreach($buchet->recenzii as $recenzie)
        <div class="border rounded p-2 mb-2">
            <strong>{{ $recenzie->nume_client }}</strong>
            <span class="text-muted">({{ $recenzie->nota }}/5)</span>
            <p class="mb-1">{{ $recenzie->text_recenzie }}</p>
        </div>
    @endforeach
@else
    <p class="text-muted">Nu există recenzii pentru acest buchet.</p>
@endif

<hr>

<h5>Adaugă recenzie</h5>

<form method="POST" action="{{ route('buchete.recenzii.store', $buchet->id) }}">
    @csrf

    <div class="mb-2">
        <label>Nume</label>
        <input type="text" name="nume_client" class="form-control @error('nume_client') is-invalid @enderror" 
               value="{{ old('nume_client') }}">
               @error('nume_client')
            <div class="text-danger small">{{ $message }}</div>
              @enderror
    </div>

    <div class="mb-2">
        <label>Recenzie</label>
        <textarea name="text_recenzie" class="form-control @error('text_recenzie') is-invalid @enderror">{{ old('text_recenzie') }}</textarea>
        @error('text_recenzie')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-2">
        <label>Notă</label>
        <select name="nota" class="form-control @error('nota') is-invalid @enderror">
            @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        @error('nota')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <button class="btn btn-success btn-sm">Adaugă recenzie</button>
</form>



<br>
<a href="{{ route('buchete.index') }}" class="btn btn-secondary">
    Înapoi la listă
</a>

@endsection
