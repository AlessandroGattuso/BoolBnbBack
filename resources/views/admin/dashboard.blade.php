@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12  my-3 d-flex justify-content-between">
            <div>
                <h2>Ciao <span class="text-capitalize">{{$userName}}</span></h2>
                <h2 class="title-dash">I tuoi appartamenti</h2>
            </div>
            <div>
                <a href="{{route('admin.apartments.create')}}">
                    <button class="btn btn-success p-2 mb-3">Aggiungi appartamento</button>
                </a>
                <h4 class="num-appartamenti">Tutti i tuoi appartamenti: {{count($apartments)}}</h4>
            </div>
        </div>

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('message')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(count($apartments) > 0)
            @foreach ($apartments as $item)
                <div class="col-12">
                    <div class="my-5 d-md-flex text-lg-left justify-content-lg-start">
                        <img class="rounded" src="{{ $item->cover ? $item->cover : 'https://picsum.photos/400/220' }}" alt="{{$item->slug}}">
                        <div class="ms-md-3">
                            <h5 id="2">ID: {{$item->id}}</h5>
                            <p>Descrizione: {{$item->descrizione}}</p>
                            <p>{{$item->slug}}</p>
                            <a href="{{route('admin.apartments.show',$item->slug)}}" class="eye"><i class="fa-solid fa-eye fa-2x m-2"></i></a>
                            <a href="{{route('admin.apartments.edit', $item->slug)}}" class="edit"><i class="fa-solid fa-pen-to-square fa-2x m-2"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class="pt-5 mt-5 text-center">
            <h2 class="fw-bolder text-danger">Non hai nessun appartamento</h2>
        </div>
        @endif
    </div>
</div>
@endsection
