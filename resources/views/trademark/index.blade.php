@extends('layout.cardlayout')
@extends('layout.layout')
@section('content')
@section('content-card')
    <h5 class="card-title text-form ">Marcas</h5>
    <hr>
    <a href="{{ route('trademarks.create') }}" class="btn btn-primary text-form text-white">Nueva Marca</a>
    <div class="table-responsive">
        <div class="d-flex justify-content-center">
            <table class="table  mt-3 table-bordered text-center table-sm ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Productos</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trademarks as $trademark)
                        <tr>
                            <th>{{ $trademark->id }}</th>
                            <th>{{ $trademark->name }}</th>
                            <td class="text-truncate" style="max-width: 150px;">{{ $trademark->description }}
                            </td>
                            <td>{{ sizeof($trademark->products) }}</td>
                            <td>{{ $trademark->reference }}</td>
                            <td colspan="2">
                                <div class="btn-group " role="group" aria-label="Basic example">
                                    <a href="{{ route('trademarks.edit', $trademark->id) }}" data-toggle="tooltip"
                                        data-placement="bottom" title="Editar" class="btn btn-transparent text-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('trademarks.show', $trademark->id) }}" data-toggle="tooltip"
                                        data-placement="bottom" title="Detalles" class="btn btn-transparent text-info"><i
                                            class="fas fa-eye"></i></a>
                                    <form action="{{ route('trademarks.destroy', $trademark->id) }}" method="post">
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
        {{ $trademarks->links() }}
    </div>
    </div>
    </div>
    </div>

@endsection
@endsection
