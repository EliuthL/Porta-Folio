<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\User;
use MongoDB\BSON\ObjectId;


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $userId = new ObjectId($userId);

        $chats = Chat::where('participant_1_id','=', $userId)
             ->orWhere('participant_2_id', '=', $userId)
             ->get();
        return response()->json(['chats'=> $chats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /*$validator = Validator::make($request->all(), [
            'post_id' => 'required|string|exists:posts,_id',
        ], [
            'post_id.required' => 'El campo post_id es obligatorio.',
            'post_id.string' => 'El campo post_id debe ser una cadena.',
            'post_id.exists' => 'El post no existe o ya no existe.',
            'participants.required' => 'El campo participants es obligatorio.',
        ]);
        
    
        // Verifica si hay errores de validación
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 422);
        }
        */


        $chat = Chat::create([
            'post_id' => new ObjectId($request->post_id), // Convertir a ObjectId si es necesario
            'participant_1_id' => new ObjectId($request->participant_1_id), // Convertir a ObjectId
            'participant_2_id' => new ObjectId(Auth::id()), // Convertir el ID autenticado a ObjectId
        ]);

        return response()->json(['message' => 'Mensaje creado con éxito', 'chat' => $chat]);



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
