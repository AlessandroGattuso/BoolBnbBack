@extends('layouts.layout')

@section('content')
    <div class="container w-75" id="successPayment">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1>Pagamento effettuato con successo</h1>
            </div>
            <div class="col-12 d-flex justify-content-center">
					 <img src="{{ URL('https://www.pikpng.com/pngl/b/428-4285487_vault-boy-thumbs-up-black-and-white-clipart.png')}}" alt="" class="mt-3 success_img">
            </div>
            <div class="col-12 text-center mt-4">
                <a class="btn success_button" href="{{route('admin.apartments.show',$slug)}}"> Torna all'appatamento</a>
            </div>
        </div>
    </div>

@endsection