@extends('layouts.plantilla')
@section('contenido')

    <h1>Modificación de una categoria</h1>

    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form action="/categoria/update" method="post">
        @method('put')
        @csrf
            <div class="form-group">
                <label for="catNombre">Nombre de la categoria</label>
                <input type="text" name="catNombre"
                       value="{{ old('catNombre', $Categoria->catNombre) }}"
                       class="form-control" id="catNombre">
            </div>
            <input type="hidden" name="idCategoria"
                   value="{{ $Categoria->idCategoria }}">

            <button class="btn btn-dark my-3 px-4">Modificar categoria</button>
            <a href="/categorias" class="btn btn-outline-secondary">
                Volver a panel de categorias
            </a>
        </form>
    </div>

    @include( 'layouts.msgValidacion' )


@endsection
