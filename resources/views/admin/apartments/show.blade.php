@extends('layouts.layout')

@section('content')
    <div class="container pb-3">
        <div class="col-12 col-md-9">
            <h2 class="fw-bolder">{{ $apartment->descrizione ? $apartment->descrizione : 'Nome non specificato' }}</h2>
        </div>
        <div class="row mt-2">  
            <div class="col-12">
                <h5 class="fw-bold m-0" mb-2>Views: <span class="badge bg_color_light_blue">{{count($apartment_views) > 0 ? count($apartment_views) : 'Nessun utente ha visualizzato il tuo apprtamento' }}</span></h5>
            </div>
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
								<span class="circle_number">
									{{ count($apartment->messages )}}
								</span>
								<i class="fa-solid fa-message"></i>
							</button>
							<div class="offcanvas offcanvas-end offcanvas_size" tabindex="-1" id="offcanvasRight"
								aria-labelledby="offcanvasRightLabel">
								<div class="offcanvas-header">
									<h4 class="offcanvas-title" id="offcanvasRightLabel">Messaggi di {{ $apartment->descrizione }}</h4>
								</div>
								<!-- elenco messaggi -->
								<div class="offcanvas-body p-3">
									<div id="messagesContainer" class="bg-light rounded-3 p-3">
										{{-- ciclo dei messaggi --}}
										@foreach( $apartment->messages as $message)
											<div class="message rounded-2 p-2">
												<div class="userName">
													<i class="fa-solid fa-circle-user"></i> {{ $message->nome}} {{ $message->cognome}}
												</div>
												<div class="userMail my-1">
													<i class="fa-solid fa-at"></i> {{ $message->email }}
												</div>
												<div class="userMessage d-flex">
													<i class="fa-solid fa-envelope me-1"></i> <span class="messageText rounded-2 p-3"> {{ $message->contenuto }} </span>
												</div>
											</div> 	
										@endforeach					
									</div>								
								</div>
							</div>
						</div>
                    <!-- Copertina appartamento -->
                    <div class="col-12">
                        <div>
                            <h5 class="fw-bold">Copertina:</h5>
                            <img src="{{($apartment->cover) ? asset('storage/' .$apartment->cover) : 'https://media.istockphoto.com/id/1147544807/it/vettoriale/la-commissione-per-la-immagine-di-anteprima-grafica-vettoriale.jpg?s=612x612&w=0&k=20&c=gsxHNYV71DzPuhyg-btvo-QhhTwWY0z4SGCSe44rvg4='}}" alt="" class="rounded w-100">
                        </div>
                    </div>

                    <!-- Dettagli appartamento -->
                    <div class="col-12 col-md-6 pt-4 mt-1">
                            
                        <h5 class="fw-bold m-0 mb-2">Prezzo: <span class="fw-light">&euro; {{ $apartment->prezzo ? $apartment->prezzo : 'Non specificato' }}</span></h5>
                        
                        <h5 class="fw-bold m-0 mb-2">Stanze: <span class="fw-light">{{ $apartment->numero_di_stanze ? $apartment->numero_di_stanze : 'Non specificato' }}</span></h5>
                        
                        <h5 class="fw-bold m-0 mb-2">Bagni: <span class="fw-light">{{ $apartment->numero_di_bagni ? $apartment->numero_di_bagni : 'Non specificato' }}</span></h5>

                        <h5 class="fw-bold m-0 mb-2">Letti: <span class="fw-light">{{ $apartment->numero_di_letti ? $apartment->numero_di_letti : 'Non specificato' }}</span></h5>

                        <h5 class="fw-bold m-0 mb-2">Dimensione: <span class="fw-light">{{ $apartment->metri_quadri ? $apartment->metri_quadri : 'Non specificato' }} mq</span></h5>
                        
                        <h5 class="fw-bold m-0 mb-2">Indirizzo: <span class="fw-light">{{ $apartment->position->indirizzo ? $apartment->position->indirizzo : 'Via non specificata' }} {{ $apartment->position->N_civico ? $apartment->position->N_civico : 'Non specificato' }}</span></h5>

                        <h5 class="fw-bold m-0 mb-2">Città: <span class="fw-light">{{ $apartment->position->città ? $apartment->position->città : 'Non specificato' }}</span></h5>

                        <h5 class="fw-bold m-0 mb-2">Visibile: <span class="fw-light">@if($apartment->visible == 1) si @else no @endif</span></h5>

                    </div>
                    <!-- Servizi -->
                    <div class="col-12 col-md-6 pt-4 mt-1">
                        <div class="mb-3">
                            <h5 class="fw-bold">Servizi:</h5>
                            <p class="m-0 overflow-y-scroll">
                                @if(count($apartment->services) > 0)
                                    <ul>
                                        @foreach( $apartment->services as $service)
                                            <li>{{$service->nome}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Nessun servizio inserito</p>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sponsorship -->
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <h5 class="fw-bold">Sponsorship attive:</h5>
                </div>

                <div class="d-md-flex">
                    @if(count($apartment->sponsorships) > 0)
                        @foreach( $apartment->sponsorships as $sponsorship)
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
                            </div>
                        @endforeach
                        <a class="btn btn-sm bg_color_light_blue me-3 text-white" href="{{ route('admin.sponsorships.index', $apartment->slug) }}">Attiva una Sponsorship</a>
                    @else
                        <p class="m-0 me-3">Nessuna sponsorships attiva</p>
                        <a class="btn btn-sm bg_color_light_blue me-3 text-white" href="{{ route('admin.sponsorships.index', $apartment->slug) }}">Attiva una Sponsorship</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-md-3 d-flex">
                <a class="btn bg_color_light_blue me-3 text-white" href="{{ route('admin.apartments.index') }}" role="button"><i class="fa-solid fa-house"></i></a>
                <a class="btn bg_color_yellow  me-2 text-white" href="{{ route('admin.apartments.edit', $apartment->slug) }}" role="button" title="Modifica il progetto"><i class="fa-solid fa-pen"></i></a>
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
@endsection