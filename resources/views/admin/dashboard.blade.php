@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12  my-3 d-flex justify-content-between">
            <div>
                <h2>Ciao....</h2>
                <h2 class="title-dash">I tuoi appartamenti</h2>
            </div>
            <div>
                <a href="{{route('admin.apartments.create')}}">
                    <button class="btn btn-success p-2 mb-3">Aggiungi appartamento</button>
                </a>
                <h4 class="num-appartamenti">Tutti i tuoi appartamenti:(0)</h4>
            </div>
        </div>
            @foreach ($apartments as $item)
            <div class="col-12">
            <div class="my-5 d-md-flex text-lg-left justify-content-lg-start">
                <img class="rounded" src="{{$item->cover}}" alt="{{$item->slug}}">
                <div class="ms-md-3">
                    <h5 id="2">ID: {{$item->id}}</h5>
                    <p>Descrizione: {{$item->descrizione}}</p>
                    <p>{{$item->slug}}</p>
                    <a href=""><i class="fa-solid fa-eye"></i></a>
                    <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href=""><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
