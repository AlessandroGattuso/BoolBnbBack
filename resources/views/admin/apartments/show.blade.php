@extends('layouts.layout')

@section('content')
    <div class="container pb-3">
        <div class="row mt-5">
            <div class="col-12 col-md-9">
                <h2 class="fw-bolder">{{ $apartment->descrizione ? $apartment->descrizione : 'Nome non specificato' }}</h2>
            </div>
            <div class="col-12 col-md-3 d-flex justify-content-end align-items-center">
                <a class="btn btn-sm btn-primary me-3" href="{{ route('admin.apartments.index') }}" role="button">Elenco appartamenti</a>
                <a class="btn btn-sm btn-warning me-2" href="{{ route('admin.apartments.edit', $apartment->slug) }}" role="button" title="Modifica il progetto">
                    <i class="fa-solid fa-edit"></i>
                </a>
                <form action="{{ route('admin.apartments.destroy', $apartment->slug) }}" class="d-inline-block" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
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
                    <p class="m-0 ms-1">€ {{ $apartment->prezzo ? $apartment->prezzo : 'Non specificato' }}</p>
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

                <div class="d-flex align-items-end mb-3">
                    <h4 class="fw-bold m-0">Indirizzo:</h4>
                    <p class="m-0 ms-1">{{ $apartment->position->indirizzo ? $apartment->position->indirizzo : 'Non specificato' }}</p>
                </div>

                <div class="d-flex align-items-end mb-3">
                    <h4 class="fw-bold m-0">N. civico:</h4>
                    <p class="m-0 ms-1">{{ $apartment->position->N_civico ? $apartment->position->N_civico : 'Non specificato' }}</p>
                </div>

                <div class="d-flex align-items-end mb-3">
                    <h4 class="fw-bold m-0">Città:</h4>
                    <p class="m-0 ms-1">{{ $apartment->position->città ? $apartment->position->città : 'Non specificato' }}</p>
                </div>

                <div class="mb-3">
                    <h5 class="fw-bold">Servizi:</h5>
                    <p class="">
                        @if(count($apartment->services) > 0)
                            <ul>
                                @foreach( $apartment->services as $service)
                                    <li>{{$service->nome}}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>Nessun servizio inserito</p>
                        @endif
                    </p>
                </div>

                <div class="mb-3">
                    <h5 class="fw-bold">Descrizione:</h5>
                    <p class="">{{ $apartment->descrizione ? $apartment->descrizione : 'Nessuna descrizione inserita' }}</p>
                </div>

                <div class="d-flex align-items-end mb-3">
                    <h5 class="fw-bold m-0">Views:</h5>
                    <p class="m-0 ms-1">{{count($apartment_views) > 0 ? count($apartment_views) : 'Nessun utente ha visualizzato il tuo apprtamento' }}</p>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 pt-5">
                <div class="mb-3">
                    <h4 class="fw-bold">Sponsorship attive:</h4>
                </div>

                <div class="d-md-flex">
                    @if(count($apartment->sponsorships) > 0)
                        @foreach( $apartment->sponsorships as $sponsorship)
                            <div class="card mb-3 me-3" style="width: 18rem;">
                                <img src="https://picsum.photos/300/200" class="card-img-top" alt="https://picsum.photos/300/200">
                                <div class="card-body">
                                    <div class="d-flex align-items-end mb-3">
                                        <h5 class="card-title m-0 me-2">Tipo: </h5>
                                        <p class="card-text">{{ $sponsorship->titolo }}</p>
                                    </div>
                                    <div class="d-flex align-items-end mb-3">
                                        <h5 class="card-title m-0 me-2">Prezzo: </h5>
                                        <p class="card-text">€ {{ $sponsorship->prezzo }}</p>
                                    </div>
                                    <div class="d-flex align-items-end mb-3">
                                        <h5 class="card-title m-0 me-2">Durata: </h5>
                                        <p class="card-text">{{ $sponsorship->ore_valide }} h</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Nessuna sponsorships attiva</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection