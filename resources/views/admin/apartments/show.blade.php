@extends('layouts.layout')

@section('content')
    <div class="container pb-3">
        <div class="row mt-5">
            <div class="col-12 col-md-9">
                <h2 class="fw-bolder">{{ $apartment->descrizione ? $apartment->descrizione : 'Nome non specificato' }}</h2>
            </div>
            <div class="col-12 col-md-3 d-flex justify-content-end align-items-center">
                <a class="btn btn-sm bg_color_light_blue me-3 text-white" href="{{ route('admin.apartments.index') }}" role="button">Elenco appartamenti</a>
                <a class="btn btn-sm bg_color_yellow  me-2 text-white" href="{{ route('admin.apartments.edit', $apartment->slug) }}" role="button" title="Modifica il progetto">
                    <i class="fa-solid fa-edit"></i>
                </a>
                <form action="{{ route('admin.apartments.destroy', $apartment->slug) }}" class="d-inline-block" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm bg_color_red text-white">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="row mt-2">  
            <div class="col-12">
                <h5 class="fw-bold m-0" mb-2>Views: <span class="badge bg_color_light_blue">{{count($apartment_views) > 0 ? count($apartment_views) : 'Nessun utente ha visualizzato il tuo apprtamento' }}</span></h5>
            </div>
        </div>
        <div class="row mt-3">
            <!-- Appartamento -->
            <div class="col-12 col-md-6">
                <div class="row">

                    <!-- Copertina appartamento -->
                    <div class="col-12">
                        <div>
                            <h5 class="fw-bold">Copertina:</h5>
                            <img src="{{ $apartment->cover ? $apartment->cover : 'https://picsum.photos/300/200' }}" alt="{{ $apartment->descrizione }}" class="rounded w-100">
                        </div>
                    </div>

                    <!-- Dettagli appartamento -->
                    <div class="col-12 col-md-6 pt-4 mt-1">
                            
                        <h5 class="fw-bold m-0 mb-2">Prezzo: <span class="fw-light">&euro; {{ $apartment->prezzo ? $apartment->prezzo : 'Non specificato' }}</span></h5>
                        
                        <h5 class="fw-bold m-0 mb-2">Stanze: <span class="fw-light">{{ $apartment->numero_di_stanze ? $apartment->numero_di_stanze : 'Non specificato' }}</span></h5>
                        
                        <h5 class="fw-bold m-0 mb-2">Bagni: <span class="fw-light">{{ $apartment->numero_di_bagni ? $apartment->numero_di_bagni : 'Non specificato' }}</span></h5>

                        <h5 class="fw-bold m-0 mb-2">Dimensione: <span class="fw-light">{{ $apartment->metri_quadri ? $apartment->metri_quadri : 'Non specificato' }} mq</span></h5>
                        
                        <h5 class="fw-bold m-0 mb-2">Indirizzo: <span class="fw-light">{{ $apartment->position->indirizzo ? $apartment->position->indirizzo : 'Via non specificata' }} {{ $apartment->position->N_civico ? $apartment->position->N_civico : 'Non specificato' }}</span></h5>

                        <h5 class="fw-bold m-0 mb-2">Città: <span class="fw-light">{{ $apartment->position->città ? $apartment->position->città : 'Non specificato' }}</span></h5>
                    </div>
                    <!-- Servizi -->
                    <div class="col-12 col-md-6 pt-4 mt-1">
                        <div class="mb-3">
                            <h5 class="fw-bold">Servizi:</h5>
                            <p class="m-0 overflow-y-scroll">
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
                    </div>
                </div>
            </div>

            <!-- Sponsorship -->
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <h5 class="fw-bold">Sponsorship attive:</h5>
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
        <div class="row mt-3">
            
            
            
        </div>
    </div>
@endsection