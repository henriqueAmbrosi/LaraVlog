@extends('partials.layout')

@section('content')
@include('partials.menu')

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            @include('partials.errors')
            @if($post->id)
            <form method="post" action="{{route('posts.update', ['id'=> $post->id])}}">
                {{method_field('PUT')}}
                @else
                <form method="post" action="{{route('posts.store')}}">
                    @endif
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="text">Texto</label>
                            <textarea id="text" name="text" placeholder="Escreva sua postagem" rows="5" class="form-control">{{$post->text}}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category_id">Categoria</label>
                            <select id="category_id" name="category_id" class="form-control">
                                <option value="0">Selecone...</option>
                                @foreach($categories as $category)
                                @if($category->id == $post->category_id)
                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                                @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">Título</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Digite o título da postagem" value="{{$post->title}}" />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="summary">Resumo</label>
                            <textarea id="summary" name="summary" placeholder="Escreva um resumo da postagem" rows="5" class="form-control">{{$post->summary}}</textarea>
                        </div>
                    </div>
                    <a href="{{route('posts.index')}}" class="btn btn-danger">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
        </div>
    </div>
</div>
@endSection