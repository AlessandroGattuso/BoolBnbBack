<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;

class MessageController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$messages = Message::all();
		return view('admin.messages.index', compact('messages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$messages = Message::all();
		return view('messages.create', compact('messages'));
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

		return redirect()->route('admin.messages.index')->with('message', 'Messaggio eliminato correttamente');
	}
}
