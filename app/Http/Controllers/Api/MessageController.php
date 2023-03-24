<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$messages = Message::where('apartment_id',$request['apartment_id']);
		return response()->json([
            'success'  => true,
            'messages'    =>$messages
        ]);

		if($messages){
			return response()->json([
				'success'  => true,
				'messages'    =>$messages
			]);
		}else{
			return response()->json([
				'success'  => false,
				'message'    => 'Non ci sono messaggi per questo appartamento'
			]);
		}
		
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		// $messages = Message::all();
		// return view('messages.create', compact('messages'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreMessageRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreMessageRequest $request)
	{
		// Recupero i dati validati dalla richiesta
		$form_data = $request->validated();

		$newMessage = Message::create($form_data);
		return response()->json([
			'success'=> true,
			'message'=>'Hai inviato correttamente il messaggio al proprietario'

		]);

		// return redirect()->route('')->with('message', 'Il messaggio è stato inviato correttamente');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function show(Message $message)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Message $message)
	{
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateMessageRequest  $request
	 * @param  \App\Models\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateMessageRequest $request, Message $message)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Message $message)
	{
		$message->delete();
		

		return response()->json([
			'success'=> true,
			'message'=>'Hai eliminato correttamente il messaggio'
		]);
	}
}

