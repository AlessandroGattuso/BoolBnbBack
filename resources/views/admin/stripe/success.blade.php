@extends('layouts.layout')

@section('content')
    <div class="container w-75" id="successPayment">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1>Pagamento effettuato con successo</h1>
                {{-- <a class="btn btn-success w-25" href="{{route('admin.dashboard')}}">Torna alla Dashboard</a> --}}
					 <img src="{{ URL('https://www.pikpng.com/pngl/b/428-4285487_vault-boy-thumbs-up-black-and-white-clipart.png')}}" alt="" class="w-50 mt-3">
            </div>
            <div class="col-12 text-center mt-4">
                <a class="btn btn-success" href="{{route('admin.apartments.show',$slug)}}"> Torna all'appatamento</a>
            </div>
        </div>
    </div>

@endsection