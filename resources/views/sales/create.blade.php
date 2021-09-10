@extends('layout.cardlayout')
@extends('layout.layout')
@section('content')
@section('content-card')
    <h5 class="card-title text-form">Nueva venta</h5>
    <hr>
    <div class="container">
        <form class="row" action="{{ route('sales.store') }}" method="post">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="form-group">
                    @csrf
                    <label for="decription">descripción</label>
                    <textarea rows="5" columns="5" class="form-control" name="description"
                        value="">{{ old('description') }}</textarea>

                    <p class="text-danger text-center"> {{ $errors->first('description') }}</p>
                </div>
                <div class="form-group">
                    <label for="amount">Cantidad</label>
                    <input type="text" class="form-control" placeholder="0" name="amount"
                        value="{{ old('amount') }}" />
                   <p class="text-danger text-center">{{ $errors->first('amount') }}</p>
                </div>
                <div class="form-group">
                    <label for="product">Productos Disponibles</label>
                    <select id="product" name="product[]" multiple class="custom-select form-control">
                        @foreach ($products as $product)
                            <option  value="{{ $product->id}}" @if (old('product') == $product->id) selected @endif>{{ $product->name }}</option>
                        @endforeach
                    </select>

                    <p class="text-danger text-center"> {{ $errors->first('product') }}</p>
                </div>
            </div>
        </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 offset-2 mt-5">
                        <a href="{{ route('sales.index') }}" class="btn btn-danger col-4 col-md-4 col-sm-12"
                            type="submit">cancelar</a>
                        <button class="btn btn-primary col-4 col-md-4 col-sm-12" type="submit">Vender</button>
                    </div>
                </div>
            </div>

        </form>


    </div>
    <script>
        $('#product').select2({
          width: '100%',
          placeholder: "Select an Option",
          allowClear: true
        });
      </script>
@endsection
@endsection
