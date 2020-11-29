<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Validator;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $post = new Post();
        $categories = Category::where('active', true)->get();

        return view('post', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            "text" => "required|min:3",
            "category_id" => "required|exists:categories,id",
            "summary" => "required|min:3",
            "title" => "required|min:3|max:255"
        ];

        $messages = [
            "text.required" => "Escreva um corpo para a sua postagem",
            "text.min" => "O corpo da sua postagem deve ter pelo menos 3 caracteres",
            "category_id.required" => "Uma categoria deve ser selecionada",
            "category_id.exists" => "Você deve selecionar uma categoria válida",
            "summary.required" => "O campo descrição deve ser preenchido",
            "summary.min" => "O campo descrição deve ter pelo menos 3 caracteres",
            "title.required" => "O campo título deve ser preenchido",
            "title.min" => "O campo título deve ter pelo menos 3 caracteres",
            "title.max" => "O campo título deve ter no máximo 255 caracteres",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $post = new Post();
        $post->category_id = $request->input('category_id');
        $post->text = $request->input('text');
        $post->post_date = date('d/m/Y');
        $post->summary = $request->input('summary');
        $post->title = $request->input('title');

        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::where('active', true)->get();

        return view('post', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            "text" => "required|min:3",
            "category_id" => "required|exists:categories,id",
            "summary" => "required|min:3",
            "title" => "required|min:3|max:255"
        ];

        $messages = [
            "text.required" => "Escreva um corpo para a sua postagem",
            "text.min" => "O corpo da sua postagem deve ter pelo menos 3 caracteres",
            "category_id.required" => "Uma categoria deve ser selecionada",
            "category_id.exists" => "Você deve selecionar uma categoria válida",
            "summary.required" => "O campo descrição deve ser preenchido",
            "summary.min" => "O campo descrição deve ter pelo menos 3 caracteres",
            "title.required" => "O campo título deve ser preenchido",
            "title.min" => "O campo título deve ter pelo menos 3 caracteres",
            "title.max" => "O campo título deve ter no máximo 255 caracteres",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $post = Post::find($id);
        $post->category_id = $request->input('category_id');
        $post->text = $request->input('text');
        $post->summary = $request->input('summary');
        $post->title = $request->input('title');

        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
