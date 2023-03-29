@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h2>Modifica i dati dell'appartamento</h2>
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
            <form class="" action="{{route('admin.apartments.update',$apartment->slug)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="col-12 col-md-5 mt-2">
                    <label class="control-label" for="">
                        <img src="{{($apartment->cover) ? asset('storage/' .$apartment->cover) : 'https://media.istockphoto.com/id/1147544807/it/vettoriale/la-commissione-per-la-immagine-di-anteprima-grafica-vettoriale.jpg?s=612x612&w=0&k=20&c=gsxHNYV71DzPuhyg-btvo-QhhTwWY0z4SGCSe44rvg4='}}" class="w-100 mb-4 rounded-4" alt="">
                    </label>
                    <input type="file" value="{{old('apartment->cover') ?? $apartment->cover}}" name="cover" id="" class="form-control">
                </div>
                <div class="form-group my-3">
                    <label for="validationTextarea" class="form-label">
                        <strong>Descrizione*:</strong> 
                    </label>
                    <textarea class="form-control" name="descrizione" id="" placeholder="Inserisci descrizione" rows="2">{{old('apartment->descrizione') ?? $apartment->descrizione}}</textarea>
                    <div class="invalid-feedback">
                        Devi inserire una descrizione
                    </div>                
                </div>
                <div class="row">
                    <div class="col-12 col-md-5 mt-2">
                        <label for="" class="control-label">
                            <strong>Prezzo*:</strong> 
                        </label>
                        <input type="text" name="prezzo" id="" value="{{old('apartment->prezzo') ?? $apartment->prezzo}}" class="form-control" placeholder="" >
                    </div>
    
        
                </div>
                <div class="row">
                    <div class="col-12 col-md-4 mt-3">
                        <label  class="control-label" for="">
                            <strong>Stanze*:</strong> 
                        </label>
                        <input type="number" id="numero_di_stanze" name="numero_di_stanze" min="" max="" value="{{old('apartment->numero_di_stanze') ?? $apartment->numero_di_stanze}}">
                    </div>
                    <div class="col-12 col-md-4 mt-3">
                        <label  class="control-label" for="">
                            <strong>Bagni*:</strong> 
                        </label>
                        <input type="number" id="numero_di_bagni" name="numero_di_bagni" min="" max="" value="{{old('apartment->numero_di_bagni') ?? $apartment->numero_di_bagni}}">
                    </div>
                    <div class="col-12 col-md-4 mt-3">
                        <label  class="control-label" for="">
                            <strong>Metri quadri*:</strong> 
                        </label>
                        <input type="number" id="metri_quadri" name="metri_quadri" value="{{old('apartment->metri_quadri') ?? $apartment->metri_quadri}}">
                    </div>
                </div>
                <div class="form-group my-3">
                    <label for="" class="control-label d-flex flex-wrap">
                       <strong>Servizi:</strong> 
                    </label>
                    @foreach($services as $service)
                    <div class="btn-group mt-2" role="group">
                        @if($errors->any())
                          <input class="btn-check" type="checkbox" value="{{ $service->id }}" name="services[]" id="{{ $service->nome }}" {{ in_array($service->id, old('services', [])) ? 'checked' : '' }} autocomplete="off">
                          <label class="btn btn-outline-primary" for="{{ $service->nome }}" >{{ $service->nome }}</label>
                      @else
                          <input class="btn-check" type="checkbox" value="{{ $service->id }}" name="services[]" id="{{ $service->nome }}" {{ $apartment->services->contains($service) ? 'checked' : ''}}>
                          <label class="btn btn-outline-primary" for="{{ $service->nome }}">{{ $service->nome }}</label>
                      @endif
                      </div>
                    @endforeach
                </div>
                <div class="d-flex gap-3">
                    <div class="form-group my-3">
                        <label for="" class="control-label">
                           <strong>Indirizzo*:</strong> 
                           <div class="mb-3 d-flex gap-5">
                            <input name="indirizzo" type="text" class="form-control" id="formGroupExampleInput" placeholder="Inserisci Indirizzo" value="{{old('apartment->position->indirizzo') ?? $apartment->position->indirizzo}}">
                          </div>                      
                        </label>
                    </div>
                    <div class="form-group my-3">
                        <label for="" class="control-label">
                           <strong>Numero civico*:</strong> 
                           <div class="mb-3 d-flex gap-5">
                            <input name="N_civico" type="text" class="form-control" id="formGroupExampleInput" placeholder="Inserisci Indirizzo" value="{{old('apartment->position->N_civico') ?? $apartment->position->N_civico}}">
                          </div>                      
                        </label>
                    </div>
                    <div class="form-group my-3">
                        <label for="" class="control-label">
                           <strong>Città*:</strong> 
                           <div class="mb-3 d-flex gap-5">
                            <input name="città" type="text" class="form-control" id="formGroupExampleInput" placeholder="Inserisci Indirizzo" value="{{old('apartment->position->città') ?? $apartment->position->città}}">
                          </div>                      
                        </label>
                    </div>
                    <div class="form-group my-3">
                        <label for="" class="control-label">
                           <strong>Nazione*:</strong> 
                           <div class="mb-3 d-flex gap-5">
                            <input name="Nazione" type="text" class="form-control" id="formGroupExampleInput" placeholder="Inserisci Indirizzo" value="{{old('apartment->position->Nazione') ?? $apartment->position->Nazione}}">
                          </div>                      
                        </label>
                    </div>
                </div>
                <div class="form-group my-3">
                    <div class="form-check form-switch">
                        <input name="visible" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{old('apartment->visible') ? 'checked' : ''}}>
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
{!! JsValidator::formRequest("App\Http\Requests\UpdateApartmentRequest") !!}
@endsection