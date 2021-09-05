@extends('layout.cardlayout')
@extends('layout.layout')
@section('content')
@section('content-card')
    <h5 class="card-title text-form">Detalles del producto</h5>
    <hr>
    <div class="container">
        <div class="row text-form">
            <div class="col-6 col-md-6 col-sm-12">

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h2 class="text-center mb-3">{{$product->name}}</h2>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h3 class="text-left">Cantidad </h3>
                      <span class="badge  badge-pill"><h4>{{$product->stock}}</h4></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h3 class="text-left">Talla</h3>
                      <span class="badge  badge-pill"><h3>{{$product->size}}</h3></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h3 class="text-left">Marca</h3>
                      <span class="badge  badge-pill"><h3>{{$product->trademark->name}}</h3></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h3 class="text-left">Fecha de embarque </h3>
                      <span class="badge  badge-pill"><h3>{{$product->shipping_date}}</h3></span>
                    </li>
                  </ul>

            </div>
            <div class="col-6 col-md-6 col-sm-12">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h2 class="text-center mb-3">Ventas</h2>
                        <span class="badge  badge-pill"><h4>Total: {{sizeof($product->sales)}}</h4></span>
                    </li>
                    @foreach ($product->sales as $sale )
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h3 class="text-left">{{$sale->descrption}}</h3><br>
                      <span class="badge  badge-pill"><h4>{{ date("d-m-Y", strtotime($sale->created_at))}}</h4></span>
                    </li>
                    @endforeach

                  </ul>
            </div>
        </div>
    </div>
@endsection
@endsection
