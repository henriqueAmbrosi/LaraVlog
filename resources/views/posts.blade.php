@extends('partials.layout')

@section('content')
@include('partials.menu')

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Larablog - Postagens</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-success">Inserir</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-hover table-border">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Resumo</th>
                    <th>Ações</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td class="align-middle">{{$post->id}}</td>
                    <td class="align-middle ">{{$post->title}}</td>
                    <td class="align-middle">{{$post->category->name}}</td>
                    <td class="align-middle">{{strlen($post->summary) > 200 ? substr($post->summary, 0, 200).'...' : $post->summary}}</td>
                    <td class="align-middle">
                        <form action="{{route('posts.destroy', ['id'=>$post->id])}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}

                            <div class="btn-group">

                                <a href="{{route('posts.edit', ['id'=>$post->id])}}" class="btn btn-info">Editar</a>
                                <button type="submit" class="btn btn-danger">Excluir</a>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
                <table>
        </div>
    </div>
</div>
@endSection