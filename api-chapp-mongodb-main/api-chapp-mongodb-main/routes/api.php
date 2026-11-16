<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\CustomMiddleware;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Auth routes
Route::post('/register/', [AuthController::class,'register']);
Route::post('/login/', [AuthController::class,'login']);
Route::middleware('auth:sanctum')->post('/logout/', [AuthController::class,'logout']);


Route::middleware('auth:sanctum')->group(function () {
    //Posts routes
    Route::get('/allposts/', [PostController::class,'index']); //return all posts
    Route::post('/createpost/', [PostController::class,'store']); //create a post
    Route::get('/findbycategorie/{categorie}', [PostController::class,'show']); //find by categories
    Route::post('/deletepost/{id}', [PostController::class,'destroy']);//delete post

    //User routes
    Route::get('/myprofile/', [UserController::class,'index']);//view your profile
    Route::patch('/updateprofile/{id}', [UserController::class,'update']); //update your profile
    Route::get ('/viewprofile/', [UserController::class,'index']); //view others user profile


    //Chats routes
    Route::get('/ownchats/', [ChatController::class,'index']);//get all chats from the user
    Route::post('/newchat/', [ChatController::class,'store']);//create the chat for send message in rote "/sendmessage/"


    //Messages routes
    Route::post('/sendmessage/', [MessageController::class,'store']); //send a message
    Route::get('/messages/{id}', [MessageController::class,'show']);//get the messages from a chat
});

