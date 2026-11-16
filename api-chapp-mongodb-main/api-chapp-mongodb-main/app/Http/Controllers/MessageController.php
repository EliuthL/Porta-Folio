<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use MongoDB\BSON\ObjectId;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'chat_id' => 'required',
            'text'=> 'required|max:500',
        ], [
            'chat_id.required' => 'El campo post_id es obligatorio.',
            'text.max' => 'El post no existe o ya no existe.',
        ]);
        
    
        // Verifica si hay errores de validación
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 422);
        }

        $chat_id = new ObjectId($request->chat_id) ;
        $chat = Chat::find($chat_id);

        $message = new Message([
            'chat_id' => new ObjectId($request->chat_id), // Convertir el chat_id a ObjectId
            'user_id' => new ObjectId(Auth::id()),         // Convertir el user_id a ObjectId
            'text' => $request->text,                     // El texto del mensaje
        ]);

        // Guardar el mensaje relacionado con el chat
        $chat->messages()->save($message);

        return response()->json(['success'=> true],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = new ObjectId($id);
    
        // Buscar el chat y obtener los mensajes
        $chat = Chat::find( $id);

        if ($chat) {
            $messages = $chat->messages;  // Obtener los mensajes relacionados
            return response()->json(['messages' => $messages,'user_id'=>Auth::id()], 200);
        } else {
            return null;
        }
    }
    
}
