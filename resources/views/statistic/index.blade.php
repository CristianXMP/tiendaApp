@extends('layout.layout')

@section('content')
    <div class="row mt-5">
        <div class="col-md-4 ">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('img/dash.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center">Ventas realizadas</h5>
                    <h3 class="card-text text-center">{{$countSales}}</h3>

                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('img/002.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center">Marcas</h5>
                    <h3 class="card-text text-center">{{$countTrademarks}}</h3>

                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('img/002.png')}}"  alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center">Productos</h5>
                    <h3 class="card-text text-center">{{$countProducts}}</h3>

                </div>
            </div>
        </div>
    </div>


@endsection
