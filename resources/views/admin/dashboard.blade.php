@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12  my-3 d-flex justify-content-between align-items-center">
                    <h2 class="m-0 ">Ciao <span class="text-capitalize">{{$userName}}</span></h2>
                    <div class="d-flex">
                        <a href="{{route('admin.apartments.create')}}" title="Aggiungi un appartamento">
                            <img class="img-size-btn" src="{{ URL::asset('img/home-plus.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <h2 class="title-dash mt-2">I tuoi appartamenti</h2>
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
        @if(session('warning'))
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><i class="fa-solid fa-triangle-exclamation me-2"></i>{{session('warning')}}</strong>
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
                                    <div class="card_img_container">
                                        <img class="rounded w-100" src="{{($item->cover) ? asset('storage/' .$item->cover) : 'https://media.istockphoto.com/id/1147544807/it/vettoriale/la-commissione-per-la-immagine-di-anteprima-grafica-vettoriale.jpg?s=612x612&w=0&k=20&c=gsxHNYV71DzPuhyg-btvo-QhhTwWY0z4SGCSe44rvg4='}}" alt="{{$item->slug}}">
                                    </div>
                                    <div class="pt-3 d-flex">
                                        <div class="w-75">
                                            <p class="mb-2 p-0 fw-light">{{$item->numero_di_stanze}} stanze - {{$item->metri_quadri}} mq</p>
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
