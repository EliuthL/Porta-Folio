<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Validator;
use App\Models\User;

use function response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;

   
            return response()->json([
                'message' => 'Inicio de sesion exitoso',
                'token' => $success['token'], // Token de autenticacion
            ], 200); // Estado HTTP 200 "OK"
        } 
        else{ 
            return response()->json(['error'=>'Credenciales incorrectas'],401); //Estado HTTP 401 para no logged
        } 
    }


    public function logout(Request $request)
    {
        // Revocar el token actual
        $request->user()->currentAccessToken()->delete();

        // Responder con un mensaje de éxito
        return response()->json(['message' => 'Cierre ded sesion exitoso exitoso.'], 200);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',  // Asegúrate de que sea 'users'
            'password' => 'required',
            ],[
            'email.required'=> 'El campo email es requerido.',
            'email.unique'=> 'Ya existe una cuenta relacionada al correo.',
            'email.email'=> 'EL correo invalido',
            'password.required'=> 'EL campo contraseña es obligatorio',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422); // Devuelve los errores de validación
        }

    
        //$input = $request->all();
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),  // Asegúrate de que la contraseña se encripte
        ];
    
        // Crear el usuario
        $user = User::create($input);
    
        // Generar el token de acceso
        //$success['token'] = $user->createToken('MyApp')->plainTextToken;
        //$success['name'] = $user->name;
    
        // Devolver respuesta
        return response()->json([
            'message' => 'User created successfully.',
            //'body' => $success,
        ], 201); 
    }

    

}
