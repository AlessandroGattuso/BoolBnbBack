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
            <form class="" action="{{route('admin.apartments.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="form-group my-3">
                    <label for="validationTextarea" class="form-label">
                        <strong>Descrizione*:</strong> 
                    </label>
                    <textarea class="form-control" name="descrizione" id="" placeholder="Inserisci descrizione" rows="6"></textarea>
                    <div class="invalid-feedback">
                        Devi inserire una descrizione
                    </div>                
                </div>

                <div class="row d-flex justify-content-between">
                    <div class="col-12 col-md-5 mt-2">
                        <label for="" class="control-label">
                            <strong>Prezzo*:</strong> 
                        </label>
                        <input type="text" name="prezzo" id="" class="form-control" placeholder="&euro;/notte" >
                    </div>
    
                    <div class="col-12 col-md-5 mt-2">
                        <label class="control-label" for="">
                            <strong>Immagine:</strong> 
                        </label>
                        <input type="file" name="cover" id="" class="form-control">
                    </div>
                </div>

                <hr class="mt-5 mb-5">

                <div class="row mt-4">
                    <h3 class="mb-4">Dettagli appartamento <i class="fa-solid fa-list"></i></h3>
                    <div class="col-12 col-md-4 mt-3">
                        <div>
                            <label  class="control-label col-12" for="">
                                <strong>Num. Stanze*:</strong> 
                            </label>
                            <input type="number" id="numero_di_stanze" name="numero_di_stanze" min="" max="">
                        </div>
                        <div class="mt-3">
                            <label  class="control-label col-12" for="">
                                <strong>Num. Bagni*:</strong> 
                            </label>
                            <input class="" type="number" id="numero_di_bagni" name="numero_di_bagni" min="" max="">
                        </div>
                    </div>
    
                    <div class="col-12 col-md-4 mt-3">
                        <div>
                            <label  class="control-label col-12" for="">
                                <strong>Numero di Letti*:</strong> 
                            </label>
                            <input  type="number" id="numero_di_letti" name="numero_di_letti">
                        </div>
                        <div class="mt-3">
                            <label  class="control-label col-12" for="">
                                <strong>Metri quadrati*:</strong> 
                            </label>
                            <input  type="number" id="metri_quadri" name="metri_quadri">
                        </div>
                    </div>
                </div>

                <div class="form-group my-3">
                    <label for="" class="control-label d-flex flex-wrap mt-5">
                       <strong>Servizi*:</strong> 
                    </label>
                    @foreach($services as $service)     
                    <div class="btn-group mt-2" role="group">
                        <input name="services[]" type="checkbox" class="btn-check" value="{{$service->id}}" id="{{ $service->nome }}" autocomplete="off" >
                        <label class="btn btn-outline-primary" for="{{ $service->nome }}">{{ $service->nome }}</label>
                    </div>
                    @endforeach
                </div>

                <div class="mt-5 d-flex">
                    <h3>Posizione</h3>
                    <img class="img-size" src="{{ URL::asset('img/home-where.png')}}" alt="">
                </div>
                <div class="d-lg-flex gap-3">
                    <div class="form-group my-3">
                        <label for="" class="control-label">
                           <strong>Indirizzo*:</strong> 
                           <div class="mb-3 d-flex gap-5">
                            <input name="indirizzo" type="text" class="form-control" id="formGroupExampleInput" placeholder="Inserisci Indirizzo">
                          </div>                      
                        </label>
                    </div>
                    <div class="form-group my-3">
                        <label for="" class="control-label">
                           <strong>Numero civico*:</strong> 
                           <div class="mb-3 d-flex gap-5">
                            <input name="N_civico" type="text" class="form-control" id="formGroupExampleInput" placeholder="Inserisci Indirizzo">
                          </div>                      
                        </label>
                    </div>
                    <div class="form-group my-3">
                        <label for="" class="control-label">
                           <strong>Città*:</strong> 
                           <div class="mb-3 d-flex gap-5">
                            <input name="città" type="text" class="form-control" id="formGroupExampleInput" placeholder="Inserisci Indirizzo">
                          </div>                      
                        </label>
                    </div>
                    <div class="form-group my-3">
                        <label for="" class="control-label">
                           <strong>Nazione*:</strong> 
                           <div class="mb-3 d-flex gap-5">
                            <input name="Nazione" type="text" class="form-control" id="formGroupExampleInput" placeholder="Inserisci Indirizzo">
                          </div>                      
                        </label>
                    </div>
                </div>
                <div class="form-group my-3">
                    <div class="form-check form-switch">
                        <input name="visible" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Visibilità appartamento</label>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-sm btn-primary">Salva</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest("App\Http\Requests\StoreApartmentRequest") !!}
{!! JsValidator::formRequest("App\Http\Requests\StorePositionRequest") !!}
@endsection
