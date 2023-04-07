@extends('layouts.layout')

@section('content')
    <div class="container container p-4 bg-light rounded-5 mt-4">
        <div class="col-12 col-md-9 d-flex">
            <a href="{{ route('admin.apartments.index') }}" role="button"><i class="fa-solid fa-circle-arrow-left fs-3 me-2 mt-2 btn-hover color-blue"></i></a>
            <h2 class="fw-bolder">{{ $apartment->descrizione ? $apartment->descrizione : 'Nome non specificato' }}</h2>
        </div>

        <!-- Posizione appartamento -->
        <div class="col-12 col-md-6 mt-2 d-flex" id="position">
            <img class="img-size" src="{{ URL::asset('img/home-where.png')}}" alt="">
            <h5 class="fw-bold m-0 fs-6"><span class="fw-light mx-1">{{ $apartment->position->indirizzo ? $apartment->position->indirizzo : 'Via non specificata' }} {{ $apartment->position->N_civico ? $apartment->position->N_civico : 'Non specificato' }},</span></h5>
            <h5 class="fw-bold m-0 fs-6"><span class="fw-light">{{ $apartment->position->città ? $apartment->position->città : 'Non specificato' }}</span></h5>
        </div>
        
        <div class="row mt-3">
            <!-- Appartamento -->
            <div class="col-12 col-md-6">
                <div class="row">
						<!-- Offcanvas messaggi-->
						<div class="col-12" id="offcanvasMessages">
							{{-- button --}}
							<button class="btn message_button_position message_button_style" type="button"
							data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
							title="Invia un messaggio al proprietario">
								{{-- <span class="circle_number">
									{{ count($apartment->messages )}}
								</span> --}}
								<i class="fa-solid fa-message"></i>
							</button>
							<div class="offcanvas offcanvas-end offcanvas_size w-75" data-bs-backdrop="static" tabindex="-1" id="offcanvasRight"
								aria-labelledby="offcanvasRightLabel">
								<div class="offcanvas-header">
									@if (count($apartment->messages) > 0)
									<h4 class="offcanvas-title" id="offcanvasRightLabel">Messaggi di {{ $apartment->descrizione }}</h4>
									@else
									<h4 class="offcanvas-title" id="offcanvasRightLabel"> Non hai ricevuto messaggi per questo appartamento </h4>
									@endif
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
								</div>
								<!-- elenco messaggi -->
								<div class="offcanvas-body p-3">
									<div id="messagesContainer" class="bg-light rounded-3 p-3 ">
										{{-- ciclo dei messaggi --}}
										@foreach( $apartment->messages as $message)
											<div class="message rounded-2 p-3 position-relative">
												<div class="userName">
													<i class="fa-solid fa-circle-user"></i> User: {{ $message->nome}} {{ $message->cognome}}
												</div>
												<div class="userMail my-1">
													<i class="fa-solid fa-at"></i> Email: {{ $message->email }}
												</div>
												<div class="userMessage">
                                                    <div>
                                                        <i class="fa-solid fa-envelope me-1"></i>
                                                        <label for="" class="form-label"> Messaggio:</label>
                                                    </div>
                                                    <p class="messageText rounded-2 p-3"> {{ $message->contenuto }} </p>
												</div>
                                                {{-- <form method="post" action="{{ route('message.destroy') }}" class="p-6"> 

                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-square me-2 position-absolute bottom-0 end-0">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                {{-- </form --}}
											</div>
                                            @endforeach	
                                        </div>								
                                    </div>
                                </div>
                            </div>
                            
                        <!-- Copertina appartamento -->
                        <div class="col-12 position-relative">
                            <div>
                                <img src="{{($apartment->cover) ? asset('storage/' .$apartment->cover) : 'https://media.istockphoto.com/id/1147544807/it/vettoriale/la-commissione-per-la-immagine-di-anteprima-grafica-vettoriale.jpg?s=612x612&w=0&k=20&c=gsxHNYV71DzPuhyg-btvo-QhhTwWY0z4SGCSe44rvg4='}}" alt="" class="rounded w-100 max-height">
                            </div>
                            <div class="row mt-2 me-3">
                                <div class="col-12 col-md-3 mb-2 d-flex">
                                    <a href="{{ route('admin.views', ['apartment_slug'=>$apartment->slug]) }}" class="fw-bold mt-2 ms-4 position-absolute top-0 start-0" mb-2><span class="badge bg_color_light_blue"><i class="fa-solid fa-chart-simple me-2"></i>{{count($apartment_views) > 0 ? count($apartment_views) : 'Nessun utente ha visualizzato il tuo apprtamento' }}</span></a>
                                    <div class="mb-4 me-4 position-absolute bottom-0 end-0">
                                        <a class="btn bg_color_yellow  me-1 text-white" href="{{ route('admin.apartments.edit', $apartment->slug) }}" role="button" title="Modifica il progetto"><i class="fa-solid fa-pen"></i></a>
                                        <form action="{{ route('admin.apartments.destroy', $apartment->slug) }}" class="d-inline-block" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn text-white bg_color_red" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                            <!-- Modal --> 
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler eliminare l'appartamento?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                        <button class="btn btn-primary" type="submit">Si,elimina</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="fw-bold mt-2 d-flex justify-content-between">Prezzo <span>&euro; {{ $apartment->prezzo ? $apartment->prezzo : 'Non specificato' }}<span class="fw-light fs-6"> / notte</span></span></h5>
                        <hr>
                        <!-- Servizi -->
                       <div class="col-12 mt-1">
                           <div class="mb-3">
                               <h5 class="fw-bold">Servizi</h5>
                               <p class="m-0 overflow-y-scroll">
                                   @if(count($apartment->services) > 0)
                                       <ul class="list-unstyled">
                                           @foreach( $apartment->services as $service)
                                               <li><i class="fa-solid fa-check me-2"></i>{{$service->nome}}</li>
                                           @endforeach
                                       </ul>
                                   @else
                                       <p>Nessun servizio inserito</p>
                                   @endif
                               </p>
                           </div>
                       </div>
                       
                       <!-- Dettagli appartamento -->
                           <div class="row flex-wrap mb-3">
                               <div class="col-6 col-lg-4 col-xl-3 text-center pt-3">
                                   <div class="d-flex align-items-center border rounded pt-2 pe-0 pb-2 ps-2 mb-3 me-3 shadow bg-white">
                                       <img class="img-size-40 me-2" src="{{ URL::asset('img/stanze.png')}}" alt="">
                                       <h5 class="fw-light fs-6"> Stanze</h5>
                                   </div>
                                   <span class="fw-medium fs-4">{{ $apartment->numero_di_stanze ? $apartment->numero_di_stanze : 'Non specificato' }}</span>
                               </div>
                               <div class="col-6 col-lg-4 col-xl-3 text-center pt-3 pe-3">
                                   <div class="d-flex align-items-center border rounded p-2 mb-3 shadow bg-white">
                                       <img class="img-size-40 me-2" src="{{ URL::asset('img/letti.png')}}" alt="">
                                       <h5 class="fw-light fs-6"> Letti</h5>
                                   </div>
                                   <span class="fw-medium fs-4">{{ $apartment->numero_di_letti ? $apartment->numero_di_letti : 'Non specificato' }}</span>
                               </div>
                               <div class="col-6 col-lg-4 col-xl-3 text-center pt-3 pe-3">
                                   <div class="d-flex align-items-center border rounded p-2 mb-3 me-2 shadow bg-white">
                                       <img class="img-size-40 me-2" src="{{ URL::asset('img/bagni(1).png')}}" alt="">
                                       <h5 class="fw-light fs-6"> Bagni</h5>
                                   </div>
                                   <span class="fw-medium fs-4">{{ $apartment->numero_di_bagni ? $apartment->numero_di_bagni : 'Non specificato' }}</span>
                               </div>
                               <div class="col-6 col-lg-4 col-xl-3 text-center pt-3 pe-3">  
                                   <div class="d-flex align-items-center border rounded p-2 mb-3  shadow bg-white">
                                       <img class="img-size-40 me-2" src="{{ URL::asset('img/dimensione.png')}}" alt="">
                                       <h5 class="fw-light fs-6"> Mq</h5>
                                   </div>
                                   <span class="fw-medium fs-4">{{ $apartment->metri_quadri ? $apartment->metri_quadri : 'Non specificato' }} </span>
                               </div>
                           </div>
                       </div>
                       <h5 class="fw-bold mb-2">Visibile: <span class="fw-light">@if($apartment->visible == 1) si @else no @endif</span></h5>
                    </div>
                    
                    <!-- Sponsorship -->
                    <div class="col-12 col-md-6">
                        <div class="mb-1">
                            <h5 class="fw-bold">Sponsorship attive:</h5>
                        </div>
            
                    <div class="col-12">
                        @if(count($apartment->sponsorships) > 0)
                            <div class="row sponsorshipsContainer px-3 ">
                                <div class="col-12 d-flex overflow_container p-0 ps-2 pb-2">
                                    @foreach( $apartment->sponsorships as $sponsorship)
                                    <div class="card_container m-0 p-2">
                                        <!-- Card -->
                                        <div class="card sponsorship-{{ $sponsorship->titolo}} w-md-100">
                                            <!-- Header -->
                                            <div class="card-header text-center text-white">
                                                <h3 class="mb-0"> {{ $sponsorship->titolo }} </h3>
                                            </div>
                                            <!-- Body -->
                                            <div class="card-body">
                                                <div class="img-container mb-2 h-100">
                                                    <img src="{{ URL::asset('img/vetrina-'.$sponsorship->id.'.png')}}" alt="">
                                                </div>
                                            </div>
                                            <!-- Footer -->
                                            <div class="card-footer d-flex justify-content-center">
                                                <div class="price">
                                                    <strong class="text-white">
                                                        {{ $sponsorship->ore_valide }} h
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <a class="btn btn-sm button-sponsorship-Basic me-3" href="{{ route('admin.sponsorships', ['slug' => $apartment->slug]) }}">Attiva una Sponsorship</a>
                                </div>
                            </div>
                        @else
                            <p class="m-0 me-3">Nessuna sponsorships attiva</p>
                            <a class="btn btn-sm button-sponsorship-Basic me-3" href="{{ route('admin.sponsorships', ['slug' => $apartment->slug]) }}">Attiva una Sponsorship</a>
                        @endif
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection