@extends('partials.layout')

@section('content')
@include('partials.menu')

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Larapost - Categorias</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-success">Inserir</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-hover table-border">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ativa</th>
                    <th>Ações</th>
                </tr>
                @foreach($categories as $category)
                <tr>
                    <td class="align-middle">{{$category->id}}</td>
                    <td class="align-middle">{{$category->name}}</td>
                    <td class="align-middle">{{strlen($category->description) > 200 ? substr($category->description, 0, 200).'...' : $category->description}}</td>
                    <td class="align-middle">{{$category->active ? 'Sim' : 'Não'}}</td>
                    <td class="align-middle">
                        <form action="{{route('categories.destroy', ['id'=>$category->id])}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}

                            <div class="btn-group">
                                <a href="{{route('categories.edit', ['id'=>$category->id])}}" class="btn btn-info">Editar</a>
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