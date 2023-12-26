<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Affiche tous les articles
        return PostResource::collection(Post::limit(5)->get());
    }

    public function show($id)
    {
        // Affiche un article spécifique
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function store(Request $request)
    {
        // Crée un nouvel article
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        // Met à jour un article existant
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return response()->json($post);
    }

    public function destroy($id)
    {
        // Supprime un article
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(null, 204);
    }
}
