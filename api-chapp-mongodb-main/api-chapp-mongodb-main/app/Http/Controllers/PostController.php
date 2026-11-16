<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Exception;
use MongoDB\BSON\ObjectId;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::with('user')->get();
        return response()->json(['posts'=>$posts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=> 'required|max:50',
            'description'=> 'required|max:50',
            'location'=> 'required|max:50',
            'post_img_file' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'publication_date'=> 'required',
            'min_budget'=> 'required|numeric',
            'max_budget'=> 'required|numeric',
        ],[
            'title.required'=> 'El campo titulo es requerido',
            'title.max'=> 'El campo titulo no permite más de 50 caracteres',
            'description.required'=> 'El campo descripcion es requerido',
            'description.max'=> 'El campo descripcion no permite más de 50 caracteres',
            'location.required'=> 'El campo localización es requerido',
            'location.max'=> 'El campo localización no permite más de 50 caracteres',
            'post_img_file.required'=> 'La imagen de la publicación es requerida',
            'post_img_file.mimes'=> 'El archivo debe ser una imagen del tipo jpg, png, jpeg',
            'post_img_file.max'=> 'La imagen no debe pesar más de 2 MB',
            'publication_date.required'=> 'La fecha de publicación es requerida',
            'min_budget.required'=> 'El campo presupuesto mínimo es requerido',
            'min_budget.numeric'=> 'El campo presupuesto mínimo solo acepta números',
            'max_budget.required'=> 'El campo presupuesto máximo es requerido',
            'max_budget.numeric'=> 'El campo presupuesto máximo solo acepta números',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()], 422);
        }

        // Almacenar la imagen en el disco 'public'
        if ($request->hasFile('post_img_file') && $request->file('post_img_file')->isValid()) {
            $path = $request->file('post_img_file')->store('uploads', 'public');
            $url = Storage::url($path);
            $imageUrl = url($url);
        } else {
            return response()->json(['error' => 'Error al cargar la imagen'], 422);
        }

        $id = Auth::id();
        // Crear el post
        $post = new Post([
            'user_id' => new ObjectId($id),
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'url_img_post' => $imageUrl,
            'publication_date' => $request->publication_date,
            'categories' => $request->categories,
            'min_budget' => $request->min_budget,
            'max_budget' => $request->max_budget,
        ]);

        $user = User::find(new ObjectId(Auth::id()));
        $user->posts()->save( $post );

        return response()->json([
            'message' => 'Post creado con éxito',
            'post' => $post,
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $categorie)
    {
        //
        try {
            //$post = Post::where('categories', $categorie)->get();
            $post = Post::where('categories','=',$categorie)->with('user')->get();
        
            if ($post->isEmpty()) {
                return response()->json(['error' => 'Contenido no encontrado'], 404);
            }

            return response()->json($post);
        }catch(Exception $e){
            return response()->json(['error'=> 'Contenido no encontrado'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            return response()->json([ 'message'=> 'Publicacion eliminada con exito']);
        }
        catch (Exception $e) {
            return response()->json(['error'=> 'Error al eliminar el contenido'], 400);
        }
    }
}
