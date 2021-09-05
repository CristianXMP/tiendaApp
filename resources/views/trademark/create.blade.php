@extends('layout.cardlayout')
@extends('layout.layout')
@section('content')
@section('content-card')
    <h5 class="card-title text-form">Nueva Marca</h5>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12 ">
                <form action="{{ route('trademarks.store') }}" method="post">
                    <div class="form-group">
                        @csrf
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: Nike" name="name"
                            value="{{ old('name') }}" />
                       <p class="text-danger text-center">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                        @csrf
                        <label for="reference">Referencia</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: 0002" name="reference"
                            value="{{ old('reference') }}" />
                            <p class="text-danger text-center">{{ $errors->first('reference') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="decription">descripción</label>
                        <textarea rows="5" columns="5" class="form-control" name="description"
                            value="{{ old('description') }}"></textarea>
                       <p class="text-danger text-center">{{ $errors->first('description') }}</p>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-12 offset-2">

                                <a href="{{ route('trademarks.index') }}" class="btn btn-danger col-4 col-md-4 col-sm-12"
                                    type="submit">cancelar</a>
                                <button class="btn btn-primary col-4 col-md-4 col-sm-12" type="submit">Guardar</button>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
@endsection
