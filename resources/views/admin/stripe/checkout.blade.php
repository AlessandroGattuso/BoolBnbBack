@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row mt-5 d-flex">
            <div class="col-12 text-center">
                <h1>Vuoi tornare alla dashboard senza effettuare l'Upgrade?</h1>
                <a class="btn btn-warning w-25" href="{{route('admin.dashboard')}}">Torna alla Dashboard</a>
            </div>
            <form action="/session" method="POST" class="text-center mt-5">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button class="btn btn-success w-25" type="submit" id="checkout-live-button">Ci ho ripensato!</button>
            </form>
        </div>
    </div>

@endsection