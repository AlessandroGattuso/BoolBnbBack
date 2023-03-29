@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12  my-3 d-flex justify-content-between align-items-center">
                    <h2 class="m-0">Ciao <span class="text-capitalize">{{$userName}}</span></h2>
                    <div class="d-flex">
                        <h4 class="num-appartamenti m-0 me-2">Appartamenti aggiunti: <span class="fw-bold">{{count($apartments)}}</span></h4>
                        <a href="{{route('admin.apartments.create')}}" title="Aggiungi un appartamento">
                            <button class="btn btn-square btn-success mb-3"><i class="fa-solid fa-plus fa-lg"></i></button>
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <h2 class="title-dash">I tuoi appartamenti</h2>
                </div>
            </div>
        </div>

        @if(session('message'))
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('message')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        <div class="col-12 mt-4">
            <div class="row">
                @if(count($apartments) > 0)
                    @foreach ($apartments as $item)
                        <div class="col-12 col-md-4 px-4 mb-5">
                            <div class="apartment_card rounded p-2" title="Visualizza i dettagli dell'appartamento">
                                <a href="{{route('admin.apartments.show',$item->slug)}}" class="text-black">
                                    <div>
                                        <img class="rounded w-100" src="{{ $item->cover ? $item->cover : 'https://picsum.photos/400/220' }}" alt="{{$item->slug}}">
                                    </div>
                                    <div class="pt-3 d-flex">
                                        <div class="w-75">
                                            <p class="mb-2 p-0 fw-light">{{$item->numero_di_stanze}} stanze - {{$item->metri_quadri}} m2</p>
                                            <h5 class="fw-bold">{{$item->descrizione}}</h5>
                                            <p class="m-0">{{$item->position->indirizzo}} {{$item->position->N_civico}}, {{$item->position->città}}, {{$item->position->Nazione}}</p>
                                        </div>
                                        <div class="w-25">
                                            <h5 class="text-end fw-bolder">&euro; {{$item->prezzo}} notte</h5>
                                        </div>
                                    </div>
                                    <!-- <div>
                                        <a href="{{route('admin.apartments.show',$item->slug)}}" class="eye"><i class="fa-solid fa-eye fa-2x m-2"></i></a>
                                        <a href="{{route('admin.apartments.edit', $item->slug)}}" class="edit"><i class="fa-solid fa-pen-to-square fa-2x m-2"></i></a>
                                    </div> -->
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="col-12">
                    <div class="pt-5 mt-5 text-center">
                        <h2 class="fw-bolder text-danger">Non hai nessun appartamento</h2>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
