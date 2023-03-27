@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-md-6">
                <h2 class="fw-bolder">{{ $apartment->descrizione }}</h2>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a class="btn btn-sm btn-primary me-3" href="{{ route('admin.apartments.index') }}" role="button">Elenco appartamenti</a>
                <a class="btn btn-sm btn-warning" href="{{ route('admin.apartments.edit', $apartment->slug) }}" role="button" title="Modifica il progetto">
                    <i class="fa-solid fa-edit"></i>
                </a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-6">
                <div>
                    <h5 class="fw-bold">Copertina:</h5>
                    <img src="{{ $apartment->cover ? $apartment->cover : 'https://picsum.photos/300/200' }}" alt="{{ $apartment->descrizione }}" class="w-100">
                </div>
            </div>
            <div class="col-12 col-md-6 pt-4">
                <div class="d-flex align-items-end mb-3">
                    <h4 class="fw-bold m-0">Prezzo:</h4>
                    <p class="m-0 ms-1">{{ $apartment->prezzo ? $apartment->prezzo : 'Non specificato' }}</p>
                </div>

                <div class="d-flex align-items-end mb-3">
                    <h4 class="fw-bold m-0">Numero di stanze:</h4>
                    <p class="m-0 ms-1">{{ $apartment->numero_di_stanze ? $apartment->numero_di_stanze : 'Non specificato' }}</p>
                </div>

                <div class="d-flex align-items-end mb-3">
                    <h4 class="fw-bold m-0">Numero di bagni:</h4>
                    <p class="m-0 ms-1">{{ $apartment->numero_di_bagni ? $apartment->numero_di_bagni : 'Non specificato' }}</p>
                </div>

                <div class="d-flex align-items-end mb-3">
                    <h4 class="fw-bold m-0">Metri quadri:</h4>
                    <p class="m-0 ms-1">{{ $apartment->metri_quadri ? $apartment->metri_quadri : 'Non specificato' }}</p>
                </div>

                <div class="mb-3">
                    <h5 class="fw-bold">Descrizione:</h5>
                    <p class="">{{ $apartment->descrizione }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection