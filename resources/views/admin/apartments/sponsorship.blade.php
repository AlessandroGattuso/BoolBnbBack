@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row mt-5 pt-5">
            @foreach( $sponsorships as $sponsorship)
                <div class="col-12 col-md-4 pt-5 mt-5">
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
                        <div class="text-center mb-3">
                            <form action="/session" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button class="btn btn-success w-50" type="submit" id="checkout-live-button">Attiva</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection