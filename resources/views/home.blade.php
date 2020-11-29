@extends('partials.layout')

@section('head')
<link rel="stylesheet" type="text/css" href="css/home.css" media="screen" />
@endsection

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="mx-auto text-center">Bem vindo ao LaraBlog!</h2>
                </div>
            </div>
        </div>
        <div class="col-md-2 text-right">
            <a href="{{route('login')}}" class="btn btn-primary text-right">Login</a>
        </div>
    </div>
    <div class="w-100 mt-3 card-group">
        @foreach($posts as $post)

        <div id="main{{$post->id}}" onclick="flip('main','{{$post->id}}')" style="height:450px" class="card w-100 m-1 border" role="button">
            <div class="card-header">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">Categoria: {{$post->category->name}}</p>
            </div>
            <div class="card-body overflow-auto">


                <p class="card-text">{{$post->summary}}</p>

            </div>
            <div class="card-footer">
                <p class="text-right small mb-0">Clique para ler mais</p>

                <p class="text-right small mb-0">Data de postagem: {{$post->post_date}}</p>
            </div>
        </div>
        <div id="text{{$post->id}}" onclick="flip('text','{{$post->id}}')" style="height:450px" class=" card d-none w-100 m-1 border" role="button">
            <div class="card-header">
                <h5 class="card-title">{{$post->title}}</h5>
            </div>
            <div class="card-body overflow-auto">
                <p class="card-text ">{{$post->text}}</p>
            </div>
        </div>

        @endforeach
    </div>
</div>

<script src="js/home.js"></script>

@endsection