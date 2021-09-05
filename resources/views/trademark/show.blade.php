@extends('layout.cardlayout')
@extends('layout.layout')
@section('content')
@section('content-card')
          <h5 class="card-title text-form">Detalles de la marca</h5>
         <hr>
         <div class="container">
             <div class="row">
                 <div class="col-12 col-md-12 col-sm-12 ">
                    <h4 class="text-center mb-3">{{$trademark->name}}</h4>
                    <p class="text-center mb-5">{{$trademark->description}}</p>
                    <h2 class="text-center mb-4">Productos relacionados con la marca</h2>
                    <ul class="list-group">
                        @foreach ($trademark->products as $product )
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{$product->name}}
                            <span class="badge badge-primary badge-pill">{{$product->stock}}</span>
                          </li>
                        @endforeach

                      </ul>
                 </div>
             </div>
         </div>
      </div>
</div>

@endsection
@endsection
