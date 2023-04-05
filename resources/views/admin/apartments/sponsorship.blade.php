@extends('layouts.layout')

@section('content')
    <div class="container w-75" id="sponsorshipsContainer">
		 <div class="row mt-5 px-4">
			<div class="col-12">
				<h1 class="text-center mb-0">SPONSORIZZA E METTI IN VETRINA IL TUO APPARTAMENTO</h1>
			</div>
				{{-- ciclo del sponsorship --}}
            @foreach( $sponsorships as $sponsorship)
                <div class="col-12 col-lg-4 pt-5 my-3">
							{{-- card --}}
                    <div class="card mb-3 mx-3 sponsorship-{{ $sponsorship->titolo}}">
								{{-- header  --}}
								<div class="card-header text-center text-white">
									<h3 class="mb-0"> {{ $sponsorship->titolo }} </h3>
								</div>
								{{-- body --}}
								<div class="card-body py-5">
									<div class="img-container mb-5 h-100">
										<img src="{{ URL::asset('img/vetrina-'.$sponsorship->id.'.png')}}" alt="">
									</div>
									<ul class="list-unstyled ps-1">
										<li class="d-flex mb-3">
											<i class="fa-solid fa-check pt-1 me-2"></i>
											<span>		
												Il tuo appartamento sar&agrave; visto per primo
											</span>
										</li>
										<li class="d-flex">
											<i class="fa-solid fa-check pt-1 me-2"></i>
											<span>		
												Validit&agrave; {{ $sponsorship->ore_valide }}h
											</span>
										</li>
									</ul>
								</div>
								{{-- footer --}}
                        <div class="card-footer d-flex justify-content-center">
									<div class="price">
										<strong class="fs-2 text-white">
											{{ $sponsorship->prezzo }} &euro;
										</strong>
										@if ( $sponsorship->prezzo == 5.99)
											<del class="fs-5"> 8.97 &euro; </del>
										@elseif ( $sponsorship->prezzo == 9.99 )
											<del class="fs-5"> 17.94 &euro; </del>
										@endif
									</div>
								</div>
							</div>
							{{-- submit --}}
							<div class="text-center mb-3">
								 <form action="/session/{{$sponsorship->id}}/{{$apartment->id}}" method="POST">
									  <input type="hidden" name="_token" value="{{csrf_token()}}">
									  <button class="btn btn-success w-50" type="submit" id="checkout-live-button">Attiva</button>
								 </form>
							</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection