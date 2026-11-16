<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Storage;
use MongoDB\BSON\ObjectId;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::find(Auth::id());

        $myposts = $user->posts;

        return response()->json(['user'=>$user]);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);

        $myposts = $user->posts;

        return response()->json(['user'=>$user]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|max:50',
            'email' => 'sometimes|unique:users',
            'description'=>'sometimes|max:500|nullable', 
            'phone' => 'sometimes|max:13|nullable',
            ],[
            'name.required'=> 'El campo nombre es requerido.',
            'email.required'=> 'El campo email es requerido.',
            'email.unique'=> 'Ya existe una cuenta relacionada al correo.',
            'email.email'=> 'EL correo invalido',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Almacenar la imagen en el disco 'public'
        $requestData = $request->all();
        
        if($request->hasFile('url_img_avatar')){
            if ($request->hasFile('url_img_avatar') && $request->file('url_img_avatar')->isValid()) {
                $path = $request->file('url_img_avatar')->store('uploads', 'public');
                $url = Storage::url($path);
                $requestData['url_img_avatar'] = url($url);

            } else {
                return response()->json(['error' => 'Error al cargar la imagen'], 422);
            }
        }


        $user = new User();
        $user = User::find(Auth::id());

        $data = $this->filterArray($requestData);
        
        $user->fill($data);

        $user->save();

        return response()->json(['message'=> 'Perfil actualizado con exito','user'=>$user]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function filterArray($array)
    {
        // Filtrar el array utilizando array_filter
        return array_filter($array, function ($value) {
            if (is_array($value)) {
                // Si el valor es un array, aplicar la función recursiva
                return !empty($this->filterArray($value));
            }
            return !is_null($value);
        });
    }
}
