@extends('partials.layout')

@section('content')
@include('partials.menu')


<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            @include('partials.errors')
            @if($category->id)
            <form method="post" action="{{route('categories.update', ['id'=> $category->id])}}">
                {{method_field('PUT')}}
                @else
                <form method="post" action="{{route('categories.store')}}">
                    @endif
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="name">Nome</label>
                            <Input id="name" name="name" placeholder="Nome da categoria" class="form-control" value="{{$category->name}}" />
                        </div>
                        <div class="form-group col-md-2">
                            <div class="custom-control custom-switch d-flex justify-content-center align-items-center h-100 m-3">
                                @if($category->active)
                                <input checked type="checkbox" class="custom-control-input" name="active" id="active" value="S" />
                                @else
                                <input type="checkbox" class="custom-control-input" name="active" id="active" value="S" />

                                @endif
                                <label for="active" class="custom-control-label">Ativar?</label>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">descrição</label>
                            <textarea id="description" name="description" rows="5" class="form-control" placeholder="Descrição da categoria">{{$category->description}} </textarea>

                        </div>
                    </div>
                    <a href="{{route('categories.index')}}" class="btn btn-danger">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
        </div>
    </div>
</div>
@endSection