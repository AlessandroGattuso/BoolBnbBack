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
                    <label for="validationTextarea" class="form-label">
                        <strong>Descrizione:</strong> 
                    </label>
                    <textarea class="form-control" name="descrizione" id="" placeholder="Inserisci descrizione" rows="6"></textarea>
                    <div class="invalid-feedback">
                        Devi inserire una descrizione
                    </div>                
                </div>

                <div class="row">
                    <div class="col-12 col-md-5 mt-2">
                        <label for="" class="control-label">
                            <strong>Prezzo:</strong> 
                        </label>
                        <input type="text" name="" id="" class="form-control" placeholder="" >
                    </div>
    
                    <div class="col-12 col-md-5 mt-2">
                        <label class="control-label" for="">
                            <strong>Immagine:</strong> 
                        </label>
                        <input type="file" name="cover" id="" class="form-control">
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-md-4 mt-3">
                        <label  class="control-label" for="">
                            <strong>Stanze:</strong> 
                        </label>
                        <input type="number" id="numero_di_stanze" name="numero_di_stanze" min="" max="">
                    </div>
                    <div class="col-12 col-md-4 mt-3">
                        <label  class="control-label" for="">
                            <strong>Bagni:</strong> 
                        </label>
                        <input type="number" id="numero_di_bagni" name="numero_di_bagni" min="" max="">
                    </div>
                    <div class="col-12 col-md-4 mt-3">
                        <label  class="control-label" for="">
                            <strong>Metri quadri:</strong> 
                        </label>
                        <input type="number" id="metri_quadri" name="metri_quadri">
                    </div>
                </div>

                <div class="form-group my-3">
                    <label for="" class="control-label">
                       <strong>Servizi:</strong> 
                    </label>
                    @foreach($services as $service)
                    <div class="">        
                        <a class="btn btn-sm btn-primary mt-2" for="" id="btn" onclick="myFunction()">{{ $service->nome }}</a>
                    </div>
                    @endforeach
                    <script>
                    const btn = document.querySelector('#btn');
                        
                    btn.addEventListener('click', function onClick() {
                        btn.style.backgroundColor = 'red';
                    });
                    </script>
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