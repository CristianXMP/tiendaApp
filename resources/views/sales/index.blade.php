@extends('layout.cardlayout')
@extends('layout.layout')
@section('content')
@section('content-card')

    <h5 class="card-title text-form ">Ventas</h5>
    <hr>
    <a href="{{ route('sales.create') }}" class="btn btn-primary text-form text-white">Nueva venta</a>
    <div class="table-responsive">
        <div class="d-flex justify-content-center">
            <table class="table  mt-3 table-bordered text-center table-sm ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cantidad de productos vendidos</th>
                        <th scope="col">Fecha de la venta</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                    <tr>
                        <th>{{ $sale->id }}</th>
                        <th>{{ $sale->description }}</th>
                        <td>{{ $sale->amount }}</td>
                        <td>{{ $sale->created_at }}</td>
                        <td colspan="2">
                            <div class="btn-group " role="group" aria-label="Basic example">
                                <a href="{{ route('sales.show', $sale->id) }}" data-toggle="tooltip"
                                    data-placement="bottom" title="Detalles" class="btn btn-transparent text-info"><i
                                        class="fas fa-eye"></i></a>

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $sales->links() }}
    </div>
    <div>
    </div>
    </div>
    </div>
    </div>

@endsection
@endsection
