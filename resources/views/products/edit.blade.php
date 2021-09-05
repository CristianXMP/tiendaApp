@extends('layout.cardlayout')
@extends('layout.layout')
@section('content')
@section('content-card')
    <h5 class="card-title text-form">Actualizar Producto</h5>
    <hr>
    <div class="container">
        <form class="row" action="{{ route('products.update', $product->id) }}" method="post">
            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ejemplo: Sueter" name="name"
                        value="{{ $product->name}}" />

                    <p class="text-danger text-center">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-group">
                    <label for="observation">Observación</label>
                    <textarea rows="5" columns="5" class="form-control" name="observation"
                       >{{ $product->observation}}</textarea>

                    <p class="text-danger text-center">{{ $errors->first('observation') }}</p>
                </div>


                <div class="form-group">
                    <label for="size">Tallas</label>
                    <select name="size" class="custom-select">
                        <option value="" selected>Seleccione una talla</option>
                        @foreach ($sizes as $size)
                            <option value="{{ $product->size }}" @if ($product->size == $size) selected @endif>{{ $size }}</option>
                        @endforeach
                    </select>

                    <p class="text-danger text-center">{{ $errors->first('size') }}</p>
                </div>
            </div>
            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="trademark">Marcas</label>
                    <select name="trademark" class="custom-select">
                        <option value="" selected>Selecciona una marca</option>
                        @foreach ($trademarks as $trademark)
                            <option  value="{{ $product->trademark->id}}" @if ($product->trademark->name == $trademark->name) selected @endif>{{ $trademark->name }}</option>
                        @endforeach
                    </select>

                    <p class="text-danger text-center"> {{ $errors->first('trademark') }}</p>
                </div>
                <div class="form-group">
                    <label for="stock">Cantidad</label>
                    <input type="number" class="form-control" placeholder="Ejemplo: 60" name="stock"  value="{{$product->stock}}" />

                    <p class="text-danger text-center"> {{ $errors->first('stock') }}</p>
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" class="form-control" placeholder="Ejemplo: 30000" name="price"  value="{{ $product->price }}"/>

                    <p class="text-danger text-center"> {{ $errors->first('price') }}</p>
                </div>
                <div class="form-group">
                    <label for="shipping_date">Fecha de embarque</label>
                    <input type="date" class="form-control" placeholder="00/00/0000" name="shipping_date"  value="{{ $product->shipping_date }}"/>

                    <p class="text-danger text-center"> {{ $errors->first('shipping_date') }}</p>
                </div>
            </div>

        </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 offset-2 mt-5">
                        <a href="{{ route('products.index') }}" class="btn btn-danger col-4 col-md-4 col-sm-12"
                            type="submit">cancelar</a>
                        <button class="btn btn-primary col-4 col-md-4 col-sm-12" type="submit">Guardar</button>
                    </div>
                </div>
            </div>

        </form>


    </div>
@endsection
@endsection
