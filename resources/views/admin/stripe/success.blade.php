@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1>Pagamento effettuato con successo</h1>
                <a class="btn btn-success w-25" href="{{route('admin.dashboard')}}">Torna alla Dashboard</a>
            </div>
        </div>
    </div>

@endsection