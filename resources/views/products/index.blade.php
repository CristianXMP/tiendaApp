@extends('layout.cardlayout')
@extends('layout.layout')
@section('content')
@section('content-card')

    <h5 class="card-title text-form ">Productos</h5>
    <hr>
    <a href="{{ route('products.create') }}" class="btn btn-primary text-form text-white">Nuevo Producto</a>
    <div class="table-responsive">
        <div class="d-flex justify-content-center">
            <table class="table  mt-3 table-bordered text-center table-sm ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Observación</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Talla</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Fecha de embarque</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th>{{ $product->id }}</th>
                            <th>{{ $product->name }}</th>
                            <th>{{ $product->observation }}</th>
                            <td>{{ $product->trademark->name }}</td>
                            <td>{{ $product->size }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->shipping_date }}</td>
                            <td colspan="2">
                                <div class="btn-group " role="group" aria-label="Basic example">
                                    <a href="{{ route('products.edit', $product->id) }}" data-toggle="tooltip"
                                        data-placement="bottom" title="Editar" class="btn btn-transparent text-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('products.show', $product->id) }}" data-toggle="tooltip"
                                        data-placement="bottom" title="Detalles" class="btn btn-transparent text-info"><i
                                            class="fas fa-eye"></i></a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Eliminar"
                                            class="btn btn-transparent text-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
    <div>
    </div>
    </div>
    </div>
    </div>

@endsection
@endsection
