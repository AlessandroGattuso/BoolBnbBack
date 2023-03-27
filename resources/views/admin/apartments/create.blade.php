@extends('layouts.admin')

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
            <form class="was-validated" ction="{{route('admin.apartments.store')}}" method="POST" enctype="multipart/form-data" >
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
                    <input type="file" name="" id="" class="form-control">
                </div>

                <div class="form-group my-3">
                    <label for="validationTextarea" class="form-label">
                        <strong>Descrizione:</strong> 
                    </label>
                    <textarea class="form-control" id="" placeholder="Inserisci descrizione" required></textarea>
                    <div class="invalid-feedback">
                        Devi inserire una descrizione
                    </div>                
                </div>

                <div class="form-group my-3">
                    <div>
                        <label  class="control-label" for="quantity">Stanze</label>
                        <input type="number" id="quantity" name="quantity" min="" max="">
                    </div>
                    <div>
                        <label  class="control-label" for="quantity">Camere</label>
                        <input type="number" id="quantity" name="quantity" min="" max="">
                    </div>
                    <div>
                        <label  class="control-label" for="quantity">Bagni</label>
                        <input type="number" id="quantity" name="quantity" min="" max="">
                    </div>
                    <div>
                        <label  class="control-label" for="quantity">Metri quadri</label>
                        <input type="number" id="quantity" name="quantity">
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
                </div>

                <div class="form-group my-3">
                    <button type="submit" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Salva</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Richiesta salvataggio</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Conferma di voler salvare questo appartamento
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                              <button type="button" class="btn btn-primary">Salva</button>
                            </div>
                          </div>
                        </div>                      
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection