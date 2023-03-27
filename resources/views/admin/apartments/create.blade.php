@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h2>Aggiungi nuovo appartamento</h2>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <form class="was-validated" action="{{route('admin.apartments.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="form-group my-3">
                    <label for="" class="control-label">
                        <strong>Titolo:</strong> 
                    </label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                    <div class="invalid-feedback">
                        Devi inserire una Titolo
                    </div> 
                </div>

                <div class="form-group my-3">
                    <label class="form-label" for="">Immagine:</label>
                    <input type="file" name="cover" id="" class="form-control">
                </div>

                <div class="form-group my-3">
                    <label for="validationTextarea" class="form-label">
                        <strong>Descrizione:</strong> 
                    </label>
                    <textarea class="form-control" name="descrizione" id="" placeholder="Inserisci descrizione" required></textarea>
                    <div class="invalid-feedback">
                        Devi inserire una descrizione
                    </div>                
                </div>

                <div class="form-group my-3">
                    <div>
                        <label  class="control-label" for="quantity">Stanze</label>
                        <input type="number" id="quantity" name="numero_di_stanze" min="" max="">
                    </div>
                    <div>
                        <label  class="control-label" for="quantity">Camere</label>
                        <input type="number" id="quantity" name="numero_di_camere" min="" max="">
                    </div>
                    <div>
                        <label  class="control-label" for="quantity">Bagni</label>
                        <input type="number" id="quantity" name="numero_di_bagni" min="" max="">
                    </div>
                    <div>
                        <label  class="control-label" for="quantity">Metri quadri</label>
                        <input type="number" id="quantity" name="metri_quadri">
                    </div>
                </div>

                <div class="form-group my-3">
                    <label for="" class="control-label">
                       <strong>Servizi:</strong> 
                    </label>
                    @foreach($services as $service)
                    <div class="form-check">        
                        <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="">
                        <label class="form-check-label" for="">{{ $service->nome }}</label>
                    </div>
                    @endforeach
                </div>

                <div class="form-group my-3">
                    <label for="" class="control-label">
                       <strong>Indirizzo:</strong> 
                    </label>
                </div>

                <div class="form-group my-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="">
                        <label for="" class="control-label">
                        Visualizza
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="">
                        <label for="" class="control-label">
                        Non Visualizzare
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Salva</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection